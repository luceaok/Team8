<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chat Application</title>
    <link rel="stylesheet" href="/Team-project-main/src/pages/chat/chat.css">
</head>
<body>

<div id="chat-app" class="chat-app">

    <!-- Function Part -->
    <div id="function-section" class="function-section">
        <div id="tabs">
            <button type="button" class="tab active" onclick="openTab(event, 'recent-chat')">Recent Chat</button>
            <button type="button" class="tab" onclick="openTab(event, 'contact')">Contact</button>
        </div>
        
        <div id="chat-list-section">
            <!-- Chat list items will be dynamically generated here -->
        </div>

        <div id="search-section">
            <input type="text" id="search-bar" placeholder="Enter to Search">
        </div>
    </div>

    <!-- Chat Area -->
    <div id="chat-section" class="chat-section">
        <div id="chat-header">
            <!-- Chat header content will be dynamically generated here -->
        </div>
        <div id="chat-messages">
            <!-- Chat messages will be dynamically generated here -->
        </div>
        <div id="chat-footer">
            <input type="text" id="chat-input" placeholder="Type here...">
            <button id="send-button" onclick="sendMessage()">Send</button>
        </div>
    </div>

</div>

<template id="individual-chat-header">
    <load-svg class="topic-avatar" src="../assets/profile-icon.svg">
        <style shadowroot>
            svg {
                width: 50px;
                height: 50px;
            }
            .fill {
                fill: var(--label-color);
            }
        </style>
    </load-svg>
    <div class="name"></div>
    <div class="user-story"></div>
</template>

<template id="group-chat-header">
    <load-svg class="topic-avatar" src="../assets/group-icon.svg">
        <style shadowroot>
            svg {
                width: 50px;
                height: 50px;
            }
            .fill {
                fill: var(--label-color);
            }
        </style>
    </load-svg>
    <div class="name"></div>
    <div class="user-story"></div>
    <button id="leave-group-btn">Leave Group</button>
    <button id="add-member-btn">Add Member</button>
    <button id="group-info-btn">Group Info</button>
</template>

<script src="socket.io.js"></script>
<script>
    // Initialize Socket.IO connection
    const socket = io();

    // DOM elements
    const chatListSection = document.getElementById('chat-list-section');
    const chatHeader = document.getElementById('chat-header');
    const chatMessages = document.getElementById('chat-messages');
    const chatInput = document.getElementById('chat-input');
    const sendButton = document.getElementById('send-button');
    const searchBar = document.getElementById('search-bar');

    // User data
    let currentUser = null;
    let currentChatId = null;

    // Event listener for sending messages
    sendButton.addEventListener('click', sendMessage);

    // Event listener for search functionality
    searchBar.addEventListener('input', searchChatsAndContacts);

    // Function to load chat list
    function loadChatList() {
        // Clear existing chat list
        chatListSection.innerHTML = '';

        // Fetch chat list data from the server
        fetch('/api/chats')
            .then(response => response.json())
            .then(data => {
                // Generate chat list items dynamically
                data.forEach(chat => {
                    const chatItem = document.createElement('div');
                    chatItem.classList.add('chat-list-item');
                    chatItem.dataset.chatId = chat.id;
                    chatItem.dataset.chatType = chat.type;
                    chatItem.innerHTML = `
                        <load-svg class="topic-avatar" src="${chat.type === 'individual' ? '../assets/profile-icon.svg' : '../assets/group-icon.svg'}">
                            <style shadowroot>
                                svg {
                                    width: 50px;
                                    height: 50px;
                                }
                                .fill {
                                    fill: var(--label-color);
                                }
                            </style>
                        </load-svg>
                        <div class="name">${chat.name}</div>
                    `;

                    chatItem.addEventListener('click', () => {
                        openChat(chat.id, chat.type);
                    });

                    chatListSection.appendChild(chatItem);
                });
            })
            .catch(error => {
                console.error('Error fetching chat list:', error);
            });
    }

    // Function to load contacts
    function loadContacts() {
        // Clear existing chat list
        chatListSection.innerHTML = '';

        // Fetch contacts data from the server
        fetch('/api/contacts')
            .then(response => response.json())
            .then(data => {
                // Generate contact list items dynamically
                data.forEach(contact => {
                    const contactItem = document.createElement('div');
                    contactItem.classList.add('chat-list-item');
                    contactItem.dataset.contactId = contact.id;
                    contactItem.innerHTML = `
                        <load-svg class="topic-avatar" src="../assets/profile-icon.svg">
                            <style shadowroot>
                                svg {
                                    width: 50px;
                                    height: 50px;
                                }
                                .fill {
                                    fill: var(--label-color);
                                }
                            </style>
                        </load-svg>
                        <div class="name">${contact.name}</div>
                    `;

                    contactItem.addEventListener('click', () => {
                        openChat(contact.id, 'individual');
                    });

                    chatListSection.appendChild(contactItem);
                });
            })
            .catch(error => {
                console.error('Error fetching contacts:', error);
            });
    }

    // Function to open a chat
    function openChat(chatId, chatType) {
        currentChatId = chatId;

        // Clear existing chat header and messages
        chatHeader.innerHTML = '';
        chatMessages.innerHTML = '';

        // Fetch chat data from the server
        fetch(`/api/chats/${chatId}`)
            .then(response => response.json())
            .then(data => {
                // Load chat header
                const headerTemplate = document.getElementById(chatType === 'individual' ? 'individual-chat-header' : 'group-chat-header').content.cloneNode(true);
                headerTemplate.querySelector('.name').textContent = data.name;
                headerTemplate.querySelector('.user-story').textContent = data.userStory;

                // Event listeners for group chat actions
                if (chatType === 'group') {
                    headerTemplate.querySelector('#leave-group-btn').addEventListener('click', leaveGroup);
                    headerTemplate.querySelector('#add-member-btn').addEventListener('click', addMember);
                    headerTemplate.querySelector('#group-info-btn').addEventListener('click', showGroupInfo);
                }

                chatHeader.appendChild(headerTemplate);

                // Load chat messages
                data.messages.forEach(message => {
                    const messageElement = document.createElement('div');
                    messageElement.classList.add('message');
                    messageElement.classList.add(message.senderId === currentUser.id ? 'out-message' : 'in-message');

                    const senderName = message.senderId === currentUser.id ? 'You' : message.senderName;

                    messageElement.innerHTML = `
                        ${message.senderId === currentUser.id ? `
                            <div class="message-content">
                                <div class="message-sender">${senderName}</div>
                                <div class="message-text">${message.text}</div>
                                <div class="message-time">${formatTimestamp(message.timestamp)}</div>
                            </div>
                            <load-svg class="topic-avatar" src="../assets/profile-icon.svg">
                                <style shadowroot>
                                    svg {
                                        width: 50px;
                                        height: 50px;
                                    }
                                    .fill {
                                        fill: var(--label-color);
                                    }
                                </style>
                            </load-svg>
                        ` : `
                            <load-svg class="topic-avatar" src="../assets/profile-icon.svg">
                                <style shadowroot>
                                    svg {
                                        width: 50px;
                                        height: 50px;
                                    }
                                    .fill {
                                        fill: var(--label-color);
                                    }
                                </style>
                            </load-svg>
                            <div class="message-content">
                                <div class="message-sender">${senderName}</div>
                                <div class="message-text">${message.text}</div>
                                <div class="message-time">${formatTimestamp(message.timestamp)}</div>
                            </div>
                        `}
                    `;

                    chatMessages.appendChild(messageElement);
                });

                // Scroll to the bottom of the chat messages
                chatMessages.scrollTop = chatMessages.scrollHeight;
            })
            .catch(error => {
                console.error('Error fetching chat data:', error);
            });
    }

    // Function to send a message
    function sendMessage() {
        const messageText = chatInput.value.trim();

        if (messageText !== '') {
            const messageData = {
                senderId: currentUser.id,
                chatId: currentChatId,
                text: messageText,
                timestamp: new Date().toISOString()
            };

            // Emit the message to the server
            socket.emit('message', messageData);

            // Clear the chat input
            chatInput.value = '';
        }
    }

    // Function to format timestamp
    function formatTimestamp(timestamp) {
        const date = new Date(timestamp);
        const hours = date.getHours().toString().padStart(2, '0');
        const minutes = date.getMinutes().toString().padStart(2, '0');
        return `${hours}:${minutes}`;
    }

    // Function to search chats and contacts
    function searchChatsAndContacts() {
        const searchTerm = searchBar.value.toLowerCase();

        // Fetch search results from the server
        fetch(`/api/search?term=${encodeURIComponent(searchTerm)}`)
            .then(response => response.json())
            .then(data => {
                // Clear existing chat list
                chatListSection.innerHTML = '';

                // Generate search result items dynamically
                data.chats.forEach(chat => {
                    const chatItem = document.createElement('div');
                    chatItem.classList.add('chat-list-item');
                    chatItem.dataset.chatId = chat.id;
                    chatItem.dataset.chatType = chat.type;
                    chatItem.innerHTML = `
                        <load-svg class="topic-avatar" src="${chat.type === 'individual' ? '../assets/profile-icon.svg' : '../assets/group-icon.svg'}">
                            <style shadowroot>
                                svg {
                                    width: 50px;
                                    height: 50px;
                                }
                                .fill {
                                    fill: var(--label-color);
                                }
                            </style>
                        </load-svg>
                        <div class="name">${chat.name}</div>
                    `;

                    chatItem.addEventListener('click', () => {
                        openChat(chat.id, chat.type);
                    });

                    chatListSection.appendChild(chatItem);
                });

                data.contacts.forEach(contact => {
                    const contactItem = document.createElement('div');
                    contactItem.classList.add('chat-list-item');
                    contactItem.dataset.contactId = contact.id;
                    contactItem.innerHTML = `
                        <load-svg class="topic-avatar" src="../assets/profile-icon.svg">
                            <style shadowroot>
                                svg {
                                    width: 50px;
                                    height: 50px;
                                }
                                .fill {
                                    fill: var(--label-color);
                                }
                            </style>
                        </load-svg>
                        <div class="name">${contact.name}</div>
                    `;

                    contactItem.addEventListener('click', () => {
                        openChat(contact.id, 'individual');
                    });

                    chatListSection.appendChild(contactItem);
                });
            })
            .catch(error => {
                console.error('Error fetching search results:', error);
            });
    }

    // Function to leave a group
    function leaveGroup() {
        // Emit the leave group event to the server
        socket.emit('leaveGroup', currentChatId);

        // Navigate back to the chat list
        loadChatList();
    }

    // Function to add a member to a group
    function addMember() {
        const memberId = prompt('Enter the user ID of the member to add:');

        if (memberId) {
            // Emit the add member event to the server
            socket.emit('addMember', { chatId: currentChatId, memberId });
        }
    }

    // Function to show group info
    function showGroupInfo() {
        // Fetch group info from the server
        fetch(`/api/chats/${currentChatId}/info`)
            .then(response => response.json())
            .then(data => {
                // Display group info in a modal or dialog
                alert(`Group Name: ${data.name}\nMembers: ${data.members.map(member => member.name).join(', ')}`);
            })
            .catch(error => {
                console.error('Error fetching group info:', error);
            });
    }

    // Event listeners for socket events
    socket.on('message', (message) => {
        if (message.chatId === currentChatId) {
            const messageElement = document.createElement('div');
            messageElement.classList.add('message');
            messageElement.classList.add(message.senderId === currentUser.id ? 'out-message' : 'in-message');

            const senderName = message.senderId === currentUser.id ? 'You' : message.senderName;

            messageElement.innerHTML = `
                ${message.senderId === currentUser.id ? `
                    <div class="message-content">
                        <div class="message-sender">${senderName}</div>
                        <div class="message-text">${message.text}</div>
                        <div class="message-time">${formatTimestamp(message.timestamp)}</div>
                    </div>
                    <load-svg class="topic-avatar" src="../assets/profile-icon.svg">
                        <style shadowroot>
                            svg {
                                width: 50px;
                                height: 50px;
                            }
                            .fill {
                                fill: var(--label-color);
                            }
                        </style>
                    </load-svg>
                ` : `
                    <load-svg class="topic-avatar" src="../assets/profile-icon.svg">
                        <style shadowroot>
                            svg {
                                width: 50px;
                                height: 50px;
                            }
                            .fill {
                                fill: var(--label-color);
                            }
                        </style>
                    </load-svg>
                    <div class="message-content">
                        <div class="message-sender">${senderName}</div>
                        <div class="message-text">${message.text}</div>
                        <div class="message-time">${formatTimestamp(message.timestamp)}</div>
                    </div>
                `}
            `;

            chatMessages.appendChild(messageElement);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }
    });

    socket.on('memberAdded', (data) => {
        if (data.chatId === currentChatId) {
            // Reload the chat to update the member list
            openChat(currentChatId, 'group');
        }
    });

    socket.on('memberLeft', (data) => {
        if (data.chatId === currentChatId) {
            // Reload the chat to update the member list
            openChat(currentChatId, 'group');
        }
    });

    // Initialize the chat application
    function initializeChat() {
        // Fetch the current user data from the server
        fetch('/api/user')
            .then(response => response.json())
            .then(data => {
                currentUser = data;
                loadChatList();
            })
            .catch(error => {
                console.error('Error fetching user data:', error);
            });
    }

    // Call the initialization function when the page loads
    window.addEventListener('load', initializeChat);
</script>

</body>
</html>