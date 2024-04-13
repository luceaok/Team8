<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Add Bootstrap CSS and JS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://code.jquery.com/jquery-ui-1.13.2.date2/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="/src/pages/projects/add-project-tasks.css">
        <link rel="stylesheet" type="text/css" href="/src/global.css">

        <script>
            $(function () {
                $("#accordion").accordion({
                    collapsible: true,
                    heightStyle: "content",
                    icons: { "header": "ui-icon-caret-1-s", "activeHeader": "ui-icon-caret-1-n" }
                });
            });
        </script>
    </head>

    <style>
        header {
            display: flex;
            justify-content: space-between;
        }

        h2 {
            text-align: left;
            padding: 0.4em;
            margin: 10px;
            font-weight: normal;
            display: flex;
            justify-content: space-between;
        }

        .btn-lg {
            color: var(--accent-color);
            text-align: center;
            font-size: 30px;
            margin-top: -15px;
        }

        .button-add {
            color: var(--accent-color);
            font-size: 46px;
            cursor: pointer;
        }

        .dropdown-item:active {
            background-color: var(--accent-color);
        }

        .btn-group-left,
        .btn-group-right {
            display: inline-block;
        }

        .btn-group-right {
            padding: 0.4em;
            margin-right: 30px;
        }
    </style>

    <body>
        <header>
            <h2>Projects -
                <span>
                    <div class="btn-group">
                        <button type="button" class="btn btn-lg dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            All
                        </button>
                        <div class="dropdown-menu">
                            <button class="dropdown-item" type="button">Closest deadline</button>
                            <button class="dropdown-item" type="button">Topic one</button>
                            <button class="dropdown-item" type="button">Topic two</button>
                        </div>
                    </div>
                </span>
            </h2>
            <div class="btn-group-right">
                <span class="button-add">&plus;</span>
            </div>
        </header>
        <div class="border-top my-3" style="width:95%; margin-left: 20px;"></div>
        <div class="box-table">
            <div id="accordion">
                <h3>Project One</h3>
                <div>
                    <table>
                        <tr>
                            <th style="width:30%">Employee Name</th>
                            <th style="width:20%">Tasks Assigned</th>
                            <th style="width:50%">Progress</th>
                        </tr>
                        <tr>
                            <td><span class="icon-table">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                    </svg>
                                </span>John Cena
                            </td>
                            <td id="data">3</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="icon-table">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                    </svg></span>Jean Sienna
                            </td>
                            <td id="data">7</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="icon-table">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                    </svg>
                                </span>Jon Seanuh
                            </td>
                            <td id="data">5</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div>
                        <h2>Re-assign Tasks</h2>
                        <p>Drag and drop to re-assign tasks</p>
                        <div class="d-flex flex-row mb-3" id="big-container">
                            <div class="p-2 flex-fill">
                                <div class="card">
                                    <h2 class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                        </svg></h2>
                                    <h5 class="card-title">John Cenaa</h5>
                                    <div class="border-top my-3"></div>
                                    <ul class="sortable">
                                        <li>
                                            <button class="default" type="button" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">
                                                presentation<span class="button-x">&times;</span>
                                            </button>
                                            <div class="collapse" id="collapseExample1">
                                                <p class="content">
                                                    Description: prepare a slideshow and present it to the clients
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-2 flex-fill">
                                <div class="card">
                                    <h2 class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                        </svg></h2>
                                    <h5 class="card-title">Jean Sienna</h5>
                                    <div class="border-top my-3"></div>
                                    <ul class="sortable">
                                        <li>
                                            <button class="default" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                                                unit test<span class="button-x">&times;</span>
                                            </button>
                                            <div class="collapse" id="collapseExample2">
                                                <p class="content">
                                                    Description: perform testing on sections A,C and E
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-2 flex-fill">
                                <div class="card">
                                    <h2 class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                        </svg></h2>
                                    <h5 class="card-title">Jon Seanuh</h5>
                                    <div class="border-top my-3"></div>
                                    <ul class="sortable">
                                        <li>
                                            <button class="default" type="button" data-toggle="collapse" data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
                                                requirements<span class="button-x">&times;</span>
                                            </button>
                                            <div class="collapse" id="collapseExample3">
                                                <p class="content">
                                                    Description: write a requirements document to be talked clarfied by the client
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h3>Project Two</h3>
                <div>
                    <table>
                        <tr>
                            <th style="width:30%">Employee Name</th>
                            <th style="width:20%">Tasks Assigned</th>
                            <th style="width:50%">Progress</th>
                        </tr>
                        <tr>
                            <td><span class="icon-table">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                    </svg>
                                </span>John Cena
                            </td>
                            <td id="data">3</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="icon-table">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                    </svg></span>Jean Sienna
                            </td>
                            <td id="data">7</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="icon-table">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                    </svg>
                                </span>Jon Seanuh
                            </td>
                            <td id="data">5</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div>
                        <h2>Re-assign Tasks</h2>
                        <p>Drag and drop to re-assign tasks</p>
                        <div class="d-flex flex-row mb-3" id="big-container">
                            <div class="p-2 flex-fill">
                                <div class="card">
                                    <h2 class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                        </svg></h2>
                                    <h5 class="card-title">John Cenaa</h5>
                                    <div class="border-top my-3"></div>
                                    <ul class="sortable">
                                        <li>
                                            <button class="default" type="button" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">
                                                presentation<span class="button-x">&times;</span>
                                            </button>
                                            <div class="collapse" id="collapseExample1">
                                                <p class="content">
                                                    Description: prepare a slideshow and present it to the clients
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-2 flex-fill">
                                <div class="card">
                                    <h2 class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                        </svg></h2>
                                    <h5 class="card-title">Jean Sienna</h5>
                                    <div class="border-top my-3"></div>
                                    <ul class="sortable">
                                        <li>
                                            <button class="default" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                                                unit test<span class="button-x">&times;</span>
                                            </button>
                                            <div class="collapse" id="collapseExample2">
                                                <p class="content">
                                                    Description: perform testing on sections A,C and E
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-2 flex-fill">
                                <div class="card">
                                    <h2 class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                        </svg></h2>
                                    <h5 class="card-title">Jon Seanuh</h5>
                                    <div class="border-top my-3"></div>
                                    <ul class="sortable">
                                        <li>
                                            <button class="default" type="button" data-toggle="collapse" data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
                                                requirements<span class="button-x">&times;</span>
                                            </button>
                                            <div class="collapse" id="collapseExample3">
                                                <p class="content">
                                                    Description: write a requirements document to be talked clarfied by the client
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="/src/pages/projects/add-project-tasks.js"></script>
</html>
