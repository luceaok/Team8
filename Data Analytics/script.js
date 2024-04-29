const tabs = document.querySelectorAll('.tab');
const contentAreas = document.querySelectorAll('.content');

tabs.forEach(tab => {
  tab.addEventListener('click', (e) => {
    e.preventDefault(); // Prevent default anchor tag behavior

    const target = e.target.getAttribute('href');
    const content = document.querySelector(target);

    tabs.forEach(t => t.classList.remove('active'));
    contentAreas.forEach(c => c.style.display = 'none');

    tab.classList.add('active');
    content.style.display = 'block';
  });
});

var ctx = document.getElementById('barChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June'],
        datasets: [{
            label: 'Tasks Completed',
            data: [12, 15, 9, 17, 14, 20],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

var ctx = document.getElementById('pieChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Susan', 'Jack', 'Phil', 'Michelle', 'Stuart', 'Owen'],
        datasets: [{
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

var ctx = document.getElementById('lineChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June'],
        datasets: [{
            label: 'Tasks Completed',
            data: [120, 150, 90, 170, 140, 200],
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 2,
            fill: false
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});


function filterEmp() {
    var input, filter, div, a, i;
    input = document.getElementById("empInput");
    filter = input.value.toUpperCase();
    div = document.getElementById("empDropdown");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
        var txtValue = a[i].textContent || a[i].innerText;
        if (txtValue.toUpperCase().indexOf(filter) === 0) {
        a[i].style.display = "";
        } else {
        a[i].style.display = "none";
        }
    }
    div.classList.add("show");
}

function selectName(name) {
    document.getElementById("empInput").value = name;
}

document.addEventListener("click", function(event) {
    var dropdown = document.getElementById("empDropdown");
    var input = document.getElementById("empInput");
    if (event.target !== dropdown && event.target !== input) {
      dropdown.classList.remove("show");
    }
  });

function filterProj() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("projInput");
    filter = input.value.toUpperCase();
    div = document.getElementById("projDropdown");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
      txtValue = a[i].textContent || a[i].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        a[i].style.display = "";
      } else {
        a[i].style.display = "none";
      }
    }
    div.classList.add("show");
}

function selectProj(project) {
    document.getElementById("projInput").value = project;
}

document.addEventListener("click", function(event) {
    var dropdown = document.getElementById("projDropdown");
    var input = document.getElementById("projInput");
    if (event.target !== dropdown && event.target !== input) {
      dropdown.classList.remove("show");
    }
});

  function printInputs() {
    var projInput = document.getElementById("projInput").value;
    var empInput = document.getElementById("empInput").value;
    console.log("project:", projInput);
    console.log("employee:", empInput);
  }

  document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('individualLineChart').getContext('2d');
    var individualLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ["Week 1", "Week 2", "Week 3", "Week 4", "Week 5"],
        datasets: [{
          label: 'Tasks Completed',
          data: [5, 8, 6, 10, 7],
          backgroundColor: 'rgba(54, 162, 235, 0.2)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  });

  document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('individualPieChart').getContext('2d');
    var individualPieChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['Task A', 'Task B', 'Task C', 'Task D', 'Task E'],
        datasets: [{
          label: 'Task Distribution',
          data: [20, 30, 15, 10, 25], // Example weights for tasks
          backgroundColor: [
            'rgba(255, 99, 132, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(153, 102, 255, 0.6)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          position: 'right'
        }
      }
    });
  });
  
  document.addEventListener('DOMContentLoaded', function () {
    var progressBars = document.querySelectorAll('.progress');
  
    var prevWidth = 0;
  
    progressBars.forEach(function(progressBar) {
      var progressValue = parseInt(progressBar.dataset.progress);
      var containerWidth = progressBar.parentElement.offsetWidth;
  
      // Calculate width for current segment
      var currentWidth = (progressValue / 100) * containerWidth;
  
      // Set width and left position for current segment
      progressBar.style.width = currentWidth + 'px';
      progressBar.style.left = prevWidth + 'px';
  
      // Update previous width for the next segment
      prevWidth += currentWidth;
  
      // Create label element
      var label = document.createElement('div');
      label.classList.add('label');
      label.textContent = progressValue + '%';
      label.style.left = (currentWidth / 2) + 'px'; // Center label within current segment
      progressBar.appendChild(label);
  
      // Show label on hover
      progressBar.addEventListener('mouseenter', function() {
        label.style.display = 'block';
      });
  
      progressBar.addEventListener('mouseleave', function() {
        label.style.display = 'none';
      });
    });
  });
  
  document.addEventListener('DOMContentLoaded', function () {
    // Get the dial element
    var dial = document.querySelector('.dial-circle-progress');
    var label = document.querySelector('.dial-label');
  
    // Set the completion percentage (for example, 60%)
    var completionPercentage = 70;
  
    // Calculate the stroke-dasharray value based on completion percentage
    var circumference = 2 * Math.PI * 45; // Circumference of a circle with radius 45
    var progress = (completionPercentage / 100) * circumference;
    dial.style.strokeDasharray = progress + ', ' + circumference;
  
    // Update label text with completion percentage
    label.textContent = completionPercentage + '%';
  });
  
  document.addEventListener('DOMContentLoaded', function () {
  var compareTypeSelect = document.getElementById("compare-type");
  var dateRangeOption = document.getElementById("date-range-option");
  var compareToNowCheckbox = document.getElementById("compare-to-now");
  var startInput = document.getElementById("start-date");
  var endInput = document.getElementById("end-date");

  compareTypeSelect.addEventListener('change', function() {
    var selectedOption = compareTypeSelect.value;
    if (selectedOption === "custom-dates") {
      dateRangeOption.style.display = "block";
    } else {
      dateRangeOption.style.display = "none";
    }
  });

  compareToNowCheckbox.addEventListener('change', function() {
    if (compareToNowCheckbox.checked) {
      endInput.style.display = "none";
    } else {
      endInput.style.display = "block";
    }
  });
});

function compareData() {
  var compareType = document.getElementById("compare-type").value;
  var startDate = document.getElementById("start-date").value;
  var endDate = document.getElementById("end-date").value;
  var selectedProject = document.getElementById("project-select").value;
  var compareToNow = document.getElementById("compare-to-now").checked;

  console.log("Comparison Type:", compareType);
  console.log("Start Date:", startDate);
  console.log("End Date:", endDate);
  console.log("Selected Project:", selectedProject);
  console.log("Compare to Now:", compareToNow);
}
function compareData() {
  // Generate random data for the line graph
  var data1 = generateRandomData(10);
  var data2 = generateRandomData(10);

  // Show the comparison result section
  var compareResult = document.getElementById("compare-result");
  compareResult.style.display = "flex";

  // Display the line graph
  displayLineGraph(data1, data2);

  // Scroll to the comparison result section
  compareResult.scrollIntoView({ behavior: 'smooth' });
}

// Function to generate random data for the line graph
function generateRandomData(count) {
  var data = [];
  for (var i = 0; i < count; i++) {
    data.push(Math.floor(Math.random() * 100));
  }
  return data;
}

// Function to display the line graph using Chart.js
function displayLineGraph(data1, data2) {
  var ctx = document.getElementById('compare-graph').getContext('2d');
  var chart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: Array.from({ length: data1.length }, (_, i) => i + 1),
      datasets: [{
        label: 'Data 1',
        data: data1,
        borderColor: 'red',
        fill: false
      }, {
        label: 'Data 2',
        data: data2,
        borderColor: 'blue',
        fill: false
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false
    }
  });
}
