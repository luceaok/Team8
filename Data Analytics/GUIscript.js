$(document).ready(function() {
    // Function to handle selection change in the things dropdown
    $('#things-dropdown').change(function() {
        var selectedThing = $(this).val();
        console.log("Comparison Category:", selectedThing);
        // Add your logic here for comparison
    });

    // Function to handle radio button change
    $('input[type=radio][name=compareRadio]').change(function() {
        var selectedComparison = $(this).val();
        console.log("Selected Comparison:", selectedComparison);
        if (selectedComparison === 'averageTeamMember') {
            $('#projectsDropdownContainer').removeClass('hidden');
            $('#dateSelectionContainer').addClass('hidden');
        } else if (selectedComparison === 'self') {
            $('#projectsDropdownContainer').addClass('hidden');
            $('#dateSelectionContainer').removeClass('hidden');
        }
    });

    // Render charts
    renderCharts();
});

function renderCharts() {
    // Pie Chart
    var pieCtx = document.getElementById('pie-chart').getContext('2d');
    var pieChart = new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: ['Task 1', 'Task 2', 'Task 3', 'Task 4', 'Task 5', 'Task 6'],
            datasets: [{
                label: 'Task Status',
                data: [10, 5, 15, 30, 20, 20],
                backgroundColor: ['#d62728 ', '#9467bd ', '#2ca02c', '#1f77b4', '#ff7f0e', '#ffbb00'],
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Task Status'
            },
            responsive: false
        }
    });

    // Line Chart
    var lineCtx = document.getElementById('line-chart').getContext('2d');
    var lineChart = new Chart(lineCtx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Performance',
                data: [65, 59, 80, 81, 56, 55, 40],
                borderColor: 'blue',
                fill: false
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Performance Over Time'
            },
            responsive: false
        }
    });

    // Hide date selection and project selection on page load
    $('#projectsDropdownContainer').addClass('hidden');
    $('#dateSelectionContainer').addClass('hidden');

    // Listen to tab activation event
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var targetTab = $(e.target).attr("href"); // activated tab
        if (targetTab === "#compare-view") {
            $('#projectsDropdownContainer').addClass('hidden');
            $('#dateSelectionContainer').addClass('hidden');
        }
    });
}

// Sample data for task weight completion by week
const data = {
    labels: ["Week 1", "Week 2", "Week 3", "Week 4", "Week 5"],
    datasets: [{
      label: "Task Weight Completed",
      data: [20, 40, 60, 80, 100], // Sample completion percentages for each week
      borderColor: "blue",
      fill: false
    }]
  };

  // Configuration for the chart
  const config = {
    type: 'line',
    data: data,
    options: {
      responsive: true,
      plugins: {
        title: {
          display: true,
          text: 'Task Weight Completion by Week'
        }
      },
      scales: {
        x: {
          title: {
            display: true,
            text: 'Weeks'
          }
        },
        y: {
          title: {
            display: true,
            text: 'Completion Percentage'
          },
          min: 0,
          max: 100,
          ticks: {
            stepSize: 10
          }
        }
      }
    },
  };

  // Create the chart
  var myChart = new Chart(
    document.getElementById('taskCompletionChart'),
    config
  );

// Sample data for top three employees task breakdown
const company_data = {
    labels: ["Employee 1", "Employee 2", "Employee 3"],
    datasets: [{
      label: "Complete",
      data: [85, 70, 43], // Sample complete task weights
      backgroundColor: "green",
      barThickness: 30
    }, {
      label: "In Progress",
      data: [10, 23, 12], // Sample in progress task weights
      backgroundColor: "orange",
      barThickness: 30
    }, {
      label: "Not Started",
      data: [10, 20, 10], // Sample not started task weights
      backgroundColor: "red",
      barThickness: 30
    }]
  };

  // Configuration for the chart
  const configure = {
    type: 'bar',
    data: company_data,
    options: {
      responsive: true,
      plugins: {
        title: {
          display: true,
          text: 'Top Three Employees Task Breakdown'
        }
      },
      scales: {
        x: {
          stacked: true,
          title: {
            display: true,
            text: 'Employees'
          }
        },
        y: {
          stacked: true,
          title: {
            display: true,
            text: 'Task Weight'
          },
          min: 0
        }
      }
    }
  };

  // Create the chart
  var myChart = new Chart(
    document.getElementById('employeeTaskChart'),
    configure
  );

  const projectData = {
    labels: ['Whole Project', 'Employee 1', 'Employee 2', 'Employee 3'], // Example employee names
    datasets: [{
      label: 'In Progress Tasks',
      backgroundColor: 'rgba(54, 162, 235, 0.5)',
      data: [10, 5, 8, 6] // Example number of in-progress tasks for each entity
    }, {
      label: 'Completed Tasks',
      backgroundColor: 'rgba(75, 192, 192, 0.5)',
      data: [20, 10, 15, 12] // Example number of completed tasks for each entity
    }]
  };

  // Chart options
  const chartOptions = {
    scales: {
      xAxes: [{ stacked: true }],
      yAxes: [{ stacked: true }]
    }
  };

  // Create the chart
  const ctx = document.getElementById('projectChart').getContext('2d');
  const projectChart = new Chart(ctx, {
    type: 'bar',
    data: projectData,
    options: chartOptions
  });

    // Sample data for past and current performance
    const pastPerformance = [50, 60, 65, 55, 70, 75, 80];
    const currentPerformance = [55, 65, 70, 60, 75, 80, 85];
    const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'];

    // Chart configuration
    const config_performance = {
      type: 'line',
      data: {
        labels: labels,
        datasets: [{
          label: 'Past Performance',
          backgroundColor: 'rgba(54, 162, 235, 0.2)',
          borderColor: 'rgba(54, 162, 235, 1)',
          data: pastPerformance,
          fill: false
        }, {
          label: 'Current Performance',
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          borderColor: 'rgba(255, 99, 132, 1)',
          data: currentPerformance,
          fill: false
        }]
      },
      options: {
        responsive: true,
        title: {
          display: true,
          text: 'Employee Performance Comparison'
        },
        scales: {
          xAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Month'
            }
          }],
          yAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Performance'
            }
          }]
        }
      }
    };

    // Create the chart
    window.onload = function() {
      const ctx_performance = document.getElementById('performanceChart').getContext('2d');
      window.performanceChart = new Chart(ctx_performance, config_performance);
    };

    