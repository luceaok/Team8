<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$userId = $_SESSION["user"] -> id ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Analytics</title>
    <!-- Stylesheet CSS -->
    <link rel="stylesheet" href="GUIstyle.css">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
</head>
<body>
    <div class="container-fluid">
        <h1 class="text-center mt-4">Data Analytics</h1>
        <ul class="nav nav-tabs navbar-fixed-top justify-content-center mt-4">
            <li class="nav-item">
                <a class="nav-link active" id="employee-tab" data-toggle="tab" href="#employee-view">Employee View</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="team-tab" data-toggle="tab" href="#team-view">Team View</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="compare-tab" data-toggle="tab" href="#compare-view">Compare View</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="company-tab" data-toggle="tab" href="#company-view">Company View</a>
            </li>
        </ul>
        <div class="tab-content mt-2">
            <div class="tab-pane fade show active" id="employee-view">
                <!-- Content for Employee View tab -->
               
           <hr class="divider">
                <div class="progress-title">Current Task Progress:</div><br>
                <div class="progress-container">
                    <div class="progress" id="progress-bar">
                      <div class="progress-bar bg-completed" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                        <span class="completed">60%</span>
                      </div>
                      <div class="progress-bar bg-ongoing" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                        <span class="completed">30%</span>
                      </div>
                      <div class="progress-bar bg-danger" role="progressbar" style="width: 10%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                        <span class="completed">10%</span>
                      </div>
                    </div>
                  </div>
        
                <div class="progress-key">
                    <div class="key-item">
                        <div class="key-color key-green"></div>
                        <span>Complete</span>
                    </div>
                    <div class="key-item">
                        <div class="key-color key-yellow"></div>
                        <span>Ongoing</span>
                    </div>
                    <div class="key-item">
                        <div class="key-color key-red"></div>
                        <span>Overdue</span>
                    </div>
                    <hr class="divider"><br><br>  
                
                </div>
        
                <!-- Charts -->
                <div class="chart-container">
                    <canvas id="pie-chart" width="400" height="400"></canvas>
                    <div class="number-container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="number-box" id="projectsBox">
                                    <div>You have:</div>
                                    <div id="projectsNumber"></div>
                                    <div>Projects</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="number-box" id="tasksBox">
                                    <div>You have:</div>
                                    <div id="tasksNumber"></div>
                                    <div>Tasks</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <canvas id="line-chart" width="400" height="400"></canvas>
                </div>
            </div>
            <div class="tab-pane fade" id="team-view">
                <!-- Content for Team View tab -->
                <!-- Dropdown for team member projects -->
                <div class="row mt-3 hidden" id="projectsDropdownContainer">
                    <div class="col-md-6">
                        <label for="projects-dropdown">Select a Project:</label>
                        <select id="projects-dropdown" class="form-control">
                            <option value="project1">Project 1</option>
                            <option value="project2">Project 2</option>
                            <option value="project3">Project 3</option>
                            <option value="project4">Project 4</option>
                            <option value="project5">Project 5</option>
                        </select>
                        <div style="max-width: 800px; margin: 20px auto;">
                            <canvas id="projectChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show active" id="compare-view">

            <!-- Content for Compare View tab -->
                <!-- Dropdown for average team member projects -->
                <div class="row mt-3 hidden" id="projectsDropdownContainer">
                    <div class="col-md-6">
                        <label for="compare-projects-dropdown">Select a Project:</label>
                        <select id="compare-projects-dropdown" class="form-control">
                            
                        </select>
                        <div style="max-width: 800px; margin: 20px auto;">
                            <canvas id="averageProjectChart"></canvas>
                        </div>
                    </div>
                </div>
            </div><!-- Content for Compare View tab 
            <div class="tab-pane fade show active" id="compare-view">
                
                <div class="container compare-container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="category">
                                <label for="things-dropdown">Select a Comparison Category:</label>
                                <select id="things-dropdown" class="form-control">
                                    <option value="option1">Productivity</option>
                                    <option value="option2">Efficiency</option>
                                    <option value="option3">Man Hours</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 vertical-divider">
                            
                            <div class="container mt-5">
                                <label>Compare With My Stats From:</label>
                                <div class="row">
                                  <div class="col-md-5">
                                    <input type="date" id="startDate" class="form-control date-picker">
                                  </div>
                                  <div class="col-md-2 text-center">
                                    <p class="my-2">to</p>
                                  </div>
                                  <div class="col-md-5">
                                    <input type="date" id="endDate" class="form-control date-picker">
                                  </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="performance-container">
                            <canvas id="performanceChart" width="70" height="20"></canvas>
                        </div>
                    </div>
                </div>
            </div>-->
            <div class="tab-pane fade" id="company-view">
                <!-- Content for Company View tab -->
                <div class="notification">
                    <span class="message">Your company performance was</span>
                    <span class="percentage" id="performance-percent">30%</span>
                    <span class="comparison" id="performance-comparison">better than last week</span>
                </div>
                <div class="chart-container2">
                    <canvas id="taskCompletionChart"></canvas>
                    <canvas id="employeeTaskChart"></canvas>
                </div>

            </div>
        </div>
    </div>
            

    <!-- Bootstrap JS and jQuery -->
    <!-- Bootstrap JS and jQuery -->
    <script>var userId = <?php echo json_encode($userId); ?>;</script> 
    <script>var userId = 1 </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="GUIscript.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script><!--
    -->
    
    
    
</body>
</html>
