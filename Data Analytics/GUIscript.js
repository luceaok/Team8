



$(document).ready(function() {
    // Function to handle selection change in the things dropdown
    /*
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
*/
    // Render charts
    renderCharts();
    getPieData(userId);
    getNumProjects(userId);
    getNumTasks(userId);
    getLinePerformanceData(userId);
    getTaskStatuses(userId);
    getProjects(userId);
    getComparison(userId);
    getCompanyWeeklyCompletion();
    getTopEmployeesData();
    getPerformancePercent();
});


function renderCharts() {
    

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



// ------------- EMPLOYEE VIEW --------------------

//alert("current user", userId);
var pieChartData;
var numProjects;
var numTasks;
var linePerformanceData;

async function queryIndividualAPI(data_about, q_data, target_id='', when = '' ) {
  try {
    // Define the URL of the API and parameters
    
    const apiUrl = 'http://34.147.182.3/v1.1/data-analytics/individual-analytics';
    const params = {
      'access-code': 'BidscJhwio!hooa',
      'data-about': data_about,
      'data': q_data,
      'target-id': target_id,
      'when': when
    };


    // Construct the query string from parameters
    const queryString = new URLSearchParams(params).toString();
    const urlWithParams = `${apiUrl}?${queryString}`;
    console.log(urlWithParams);

    // Make the GET request
    const response = await fetch(urlWithParams);
    
    // Check if the response is OK
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    
    // Parse response data
    const data = await response.json();
    
    // Process the data returned by the API
    console.log("Received data:", data['analytics-data']);
    return data['analytics-data'];

  } catch (error) {
    console.error('There was a problem with the fetch operation:', error);
    throw error; // Re-throw the error to propagate it to the caller
  }
}



async function getPieData(targetId) {
  try {
    const analytics_data = await queryIndividualAPI("self", "task-weight-breakdown", targetId);
    pieChartData = analytics_data;
    renderPieChart();
    return pieChartData;
  } catch (error) {
    console.error('Error fetching analytics data:', error);
  }
}

function renderPieChart(){
  // Pie Chart
  var pieCtx = document.getElementById('pie-chart').getContext('2d');
  var pieChart = new Chart(pieCtx, pieChartData);
}

async function getNumProjects(targetId) {
  try {
    const analytics_data = await queryIndividualAPI("self", "num-projects", targetId);
    numProjects = analytics_data;
    renderNumProjects();
    return numProjects;
  } catch (error) {
    console.error('Error fetching analytics data:', error);
  }
}

function renderNumProjects(){
  document.getElementById('projectsNumber').innerHTML = numProjects;
}

async function getNumTasks(targetId) {
  try {
    const analytics_data = await queryIndividualAPI("self", "num-tasks", targetId);
    numTasks = analytics_data;
    renderNumTasks();
    return numTasks;
  } catch (error) {
    console.error('Error fetching analytics data:', error);
  }
}

function renderNumTasks(){
  document.getElementById('tasksNumber').innerHTML = numTasks;
}

async function getLinePerformanceData(targetId) {
  try {
    const analytics_data = await queryIndividualAPI("self", "weekly-task-completion", targetId);
    linePerformanceData = analytics_data;
    renderLineChart();
    return linePerformanceData;
  } catch (error) {
    console.error('Error fetching analytics data:', error);
  }
}

function renderLineChart(){
      // Line Chart
      var lineCtx = document.getElementById('line-chart').getContext('2d');
      var lineChart = new Chart(lineCtx, linePerformanceData);
}

async function getTaskStatuses(userId){
  try {
    const analytics_data = await queryIndividualAPI("self", "task-status-proportions", userId);
    taskStatus = analytics_data;
    let complete = taskStatus["Complete"];
    let in_progress = taskStatus["In Progress"];
    let overdue = taskStatus["Overdue"];
    let total_weight = complete + in_progress + overdue;
    complete = complete ? Number(((complete / total_weight ) * 100).toFixed(1)) : 0;
    in_progress = in_progress? Number(((in_progress / total_weight ) * 100).toFixed(1)) : 0;
    overdue = overdue ? Number(((overdue / total_weight ) * 100).toFixed(1)) : 0;
    let bars = `<div class="progress-bar bg-completed" role="progressbar" style="width: ${complete}%;" aria-valuenow="${complete}" aria-valuemin="0" aria-valuemax="100">
                  <span class="completed">${complete}%</span>
                </div>
                <div class="progress-bar bg-ongoing" role="progressbar" style="width: ${in_progress}%;" aria-valuenow="${in_progress}" aria-valuemin="0" aria-valuemax="100">
                  <span class="completed">${in_progress}%</span>
                </div>
                <div class="progress-bar bg-danger" role="progressbar" style="width: ${overdue}%;" aria-valuenow="${overdue}" aria-valuemin="0" aria-valuemax="100">
                  <span class="completed">${overdue}%</span>
                </div>`;
   document.getElementById("progress-bar").innerHTML = bars;
 
  } catch (error) {
    console.error('Error fetching analytics data:', error);
  }


}
 
// ------------ END OF EMPLOYEE VIEW ----------------------------

// ------------ PROJECTS VIEW -----------------------------------

var leadingProjects;
var projectOptions = "";
var projectStatusData;

async function queryProjectsAPI(data_about, q_data, target_id='', when = '', my_id = '' ) {
  try {
    // Define the URL of the API and parameters
    
    const apiUrl = 'http://34.147.182.3/v1.1/data-analytics/project-analytics';
    const params = {
      'access-code': 'FeoWemf-eqytfzk',
      'data-about': data_about,
      'data': q_data,
      'target-id': target_id,
      'when': when,
      'my-id': my_id
    };


    // Construct the query string from parameters
    const queryString = new URLSearchParams(params).toString();
    const urlWithParams = `${apiUrl}?${queryString}`;
    console.log(urlWithParams);

    // Make the GET request
    const response = await fetch(urlWithParams);
    
    // Check if the response is OK
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    
    // Parse response data
    const data = await response.json();
    
    // Process the data returned by the API
    console.log("Received data:", data['analytics-data']);
    return data['analytics-data'];

  } catch (error) {
    console.error('There was a problem with the fetch operation:', error);
    throw error; // Re-throw the error to propagate it to the caller
  }
}



async function getProjects(userId) {
  try {
    const analytics_data = await queryProjectsAPI("project", "member-projects", userId);
    leadingProjects = analytics_data;
    renderProjectOptions();
    const selectElement = document.getElementById('projects-dropdown');

    // Add an event listener for the 'change' event
    selectElement.addEventListener('change', function() {
        // Get the selected option's value
        const selectedValue = selectElement.value;
        getProjectStatus(selectedValue);
    });
    // display a chart
    getProjectStatus(leadingProjects[0]["project-id"]);
    return leadingProjects;
  } catch (error) {
    console.error('Error fetching analytics data:', error);
  }
}

function renderProjectOptions(){
  leadingProjects.forEach(addProjectOption);
  document.getElementById('projects-dropdown').innerHTML = projectOptions;
  console.log(projectOptions);

}

function addProjectOption(item){
  proj_name = item['project-name'];
  proj_id = item['project-id'];
  var newOption = `<option value=${proj_id}>${proj_name}</option>`;
  projectOptions += newOption;
}


async function getProjectStatus(project_id){
  // get the info for that project and render the result
  try {
    const analytics_data = await queryProjectsAPI("project", "task-status-breakdown", project_id);
    projectStatusData = analytics_data;
    renderProjectStatusChart();
    return projectStatusData;
  } catch (error) {
    console.error('Error fetching analytics data:', error);
  }

}

function renderProjectStatusChart(){
  // Check if an existing chart instance exists
  if (window.projectStatusChart) {
    // Destroy the existing chart
    window.projectStatusChart.destroy();
  } 
  // Chart options
  const chartOptions = {
    scales: {
      xAxes: [{ stacked: true }],
      yAxes: [{ stacked: true }]
    }
  };
  // Create the chart
  const ctx = document.getElementById('projectChart').getContext('2d');
  window.projectStatusChart = new Chart(ctx, {
    type: 'bar',
    data: projectStatusData,
    options: chartOptions
  });

}
// ---------- END OF PROJECTS VIEW -------

// ---------- COMPARE VIEW -------
var memberProjects;
var projectCompareOptions = "";
var projectPerformance;




async function getComparison(userId) {
  try {
    const analytics_data = await queryIndividualAPI("self", "member-projects", userId);
    console.log("data for comparison graph: ", analytics_data);
    memberProjects = analytics_data;
    renderMyProjectOptions();
    const selectElement = document.getElementById('compare-projects-dropdown');

        
        // Add an event listener for the 'change' event
        selectElement.addEventListener('change', function() {
            // Get the selected option's value
            const selectedValue = selectElement.value;
            renderPerformanceComparisonChart(selectedValue);
            
        });
        // display a chart
        try{
         memberProjects = await getPerformanceComparison(userId);
         renderPerformanceComparisonChart(analytics_data[0]["id"]);
        } catch (error){
          console.error('Error fetching analytics data:', error);
        }
       
        
        
        return memberProjects;
  
  } catch (error) {
    console.error('Error fetching analytics data:', error);
  }
}

function renderMyProjectOptions(){
  console.log("Here are the available memberProjects", memberProjects);
  memberProjects.forEach(addCompareProjectOption);
  document.getElementById('compare-projects-dropdown').innerHTML = projectCompareOptions;
  console.log(projectCompareOptions);
  

}

function addCompareProjectOption(item){
  proj_name = item['name'];
  proj_id = item['id'];
  var newOption = `<option value=${proj_id}>${proj_name}</option>`;
  projectCompareOptions += newOption;
}

async function getPerformanceComparison(userId){
  // get the info for that project and render the result
  try {
    const analytics_data = await queryProjectsAPI("project", "performance-metric", userId);
    projectPerformance = analytics_data;
    console.log("api for performance-metric returned", projectPerformance);
    return projectPerformance;
  } catch (error) {
    console.error('Error fetching analytics data:', error);
  }
}

function renderPerformanceComparisonChart(proj_id){
  console.log("the projectPerformance", projectPerformance);
  console.log("the proj_id", proj_id);
  console.log("projectPerformance[proj_id]", projectPerformance[proj_id]);
  // Check if an existing chart instance exists
  if (window.projectComparisonChart) {
    // Destroy the existing chart
    window.projectComparisonChart.destroy();
  } 
  // Chart options
  const chartOptions = {
    scales: {
      xAxes: [{ stacked: true }],
      yAxes: [{ stacked: true }]
    }
  };
  // Create the chart
  const ctx = document.getElementById('averageProjectChart').getContext('2d');
  window.projectComparisonChart = new Chart(ctx, {
    type: 'bar',
    data: projectPerformance[proj_id],
    options: chartOptions
  });
}








// ---------- COMPANY VIEW ----------------
// Sample data for task weight completion by week
var companyWeeklyCompletion;
var companyTopEmployees;
var performancePercent;

async function queryCompanyAPI(q_data) {
  try {
    // Define the URL of the API and parameters
    
    const apiUrl = 'http://34.147.182.3/v1.1/data-analytics/company-analytics';
    const params = {
      'access-code': 'EijfgjqbUEft.!o',
      'data': q_data
    };

    // Construct the query string from parameters
    const queryString = new URLSearchParams(params).toString();
    const urlWithParams = `${apiUrl}?${queryString}`;
    console.log(urlWithParams);

    // Make the GET request
    const response = await fetch(urlWithParams);
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    const data = await response.json();
    
    // Process the data returned by the API
    return data['analytics-data'];

  } catch (error) {
    console.error('There was a problem with the fetch operation:', error);
    throw error; 
  }
}

async function getCompanyWeeklyCompletion(){
  
  try {
    const analytics_data = await queryCompanyAPI("weekly-completion");
    companyWeeklyCompletion = analytics_data;
    renderCompanyWeeklyCompletion();
    return companyWeeklyCompletion;
  } catch (error) {
    console.error('Error fetching analytics data:', error);
  }

}

function renderCompanyWeeklyCompletion(){
 // Create the chart
  var weeklyCompletionChart = new Chart(
    document.getElementById('taskCompletionChart').getContext('2d'),
    companyWeeklyCompletion
  );
  console.log("created company's weekly task completion graph", companyWeeklyCompletion)
}

 

async function getTopEmployeesData(){
  // get the info for top employees
  try {
    const analytics_data = await queryCompanyAPI("top-employees");
    companyTopEmployees = analytics_data;
    renderTopEmployees();
    console.log("top employees data", companyTopEmployees)
    return companyTopEmployees;
  } catch (error) {
    console.error('Error fetching analytics data:', error);
  }
}

function renderTopEmployees(){
   // Create the chart
   var topEmployeesChart = new Chart(
    document.getElementById('employeeTaskChart'),
    companyTopEmployees
  );
}




async function getPerformancePercent() {
  try {
    const analytics_data = await queryCompanyAPI("performance-percent");
    performancePercent = analytics_data;
    renderPerformancePercent(performancePercent);
    return performancePercent;
  } catch (error) {
    console.error('Error fetching analytics data:', error);
  }
}

function renderPerformancePercent(performancePercent){
  const increased = "better than last week";
  const decreased = "worse than last week";
  var comparison;
  if (performancePercent > 0){
    comparison = increased;
  } else {
    comparison = decreased;
  }

  document.getElementById('performance-percent').innerHTML = (performancePercent**2)**0.5 + "%"; 
  document.getElementById('performance-comparison').innerHTML = comparison;
}

 // ------------------- END OF COMPANY VIEW -----------------


 // ------------------- COMPARE VIEW -----------------------

    // Sample data for past and current performance
    /*
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
*/
    // Create the chart
    //window.onload = function() {
      //const ctx_performance = document.getElementById('averageProjectChart').getContext('2d');
      //window.performanceChart = new Chart(ctx_performance, config_performance);
    //};

