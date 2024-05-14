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
            <?php
if ($userId != 2 && $userId != 15) {
    echo '<li class="nav-item">';
    echo '<a class="nav-link active" id="employee-tab" data-toggle="tab" href="#employee-view">Employee View</a>';
    echo '</li>';
}
?>
            <?php
if ($userId >= 1 && $userId <= 3 || $userId == 15) {
    echo '<li class="nav-item">';
    echo '<a class="nav-link" id="team-tab" data-toggle="tab" href="#team-view">Team View</a>';
    echo '</li>';
}
?>
<?php
if ($userId != 15) {
    echo '<li class="nav-item">';
    echo '<a class="nav-link" id="compare-tab" data-toggle="tab" href="#compare-view">Compare View</a>';
    echo '</li>';
}
?>
            <li class="nav-item">
                <a class="nav-link" id="company-tab" data-toggle="tab" href="#company-view">Company View</a>
            </li>
        </ul>
        <div class="tab-content mt-2">
        <?php
if ($userId != 2 && $userId != 15) {

echo '<div class="tab-pane fade show active" id="employee-view">';        
echo '<!-- Content for Employee View tab -->';
echo '<hr class="divider">';
echo '<div class="progress-title">Current Task Progress:</div><br>';
echo '<div class="progress-container">';
echo '<div class="progress" id="progress-bar">';
echo '<div class="progress-bar bg-completed" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">';
echo '<span class="completed">60%</span>';
echo '</div>';
echo '<div class="progress-bar bg-ongoing" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">';
echo '<span class="completed">30%</span>';
echo '</div>';
echo '<div class="progress-bar bg-danger" role="progressbar" style="width: 10%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">';
echo '<span class="completed">10%</span>';
echo '</div>';
echo '</div>';
echo '</div>';

echo '<div class="progress-key">';
echo '<div class="key-item">';
echo '<div class="key-color key-green"></div>';
echo '<span>Complete</span>';
echo '</div>';
echo '<div class="key-item">';
echo '<div class="key-color key-yellow"></div>';
echo '<span>Ongoing</span>';
echo '</div>';
echo '<div class="key-item">';
echo '<div class="key-color key-red"></div>';
echo '<span>Overdue</span>';
echo '</div>';
echo '<hr class="divider"><br><br>';  

echo '</div>';

echo '<!-- Charts -->';
echo '<div class="chart-container">';
echo '<canvas id="pie-chart" width="400" height="400"></canvas>';
echo '<div class="number-container">';
echo '<div class="row">';
echo '<div class="col-md-6">';
echo '<div class="number-box" id="projectsBox">';
echo '<div>You have:</div>';
echo '<div id="projectsNumber"></div>';
echo '<div>Projects</div>';
echo '</div>';
echo '</div>';
echo '<div class="col-md-6">';
echo '<div class="number-box" id="tasksBox">';
echo '<div>You have:</div>';
echo '<div id="tasksNumber"></div>';
echo '<div>Tasks</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '<canvas id="line-chart" width="400" height="400"></canvas>';
echo '</div>';
echo '</div>';
}
?>
            <?php
if ($userId >= 1 && $userId <= 3 || $userId <= 15) {
    echo '<div class="tab-pane fade" id="team-view">';
    echo '<!-- Content for Team View tab -->';
    echo '<!-- Dropdown for team member projects -->';
    echo '<div class="row mt-3 hidden" id="projectsDropdownContainer">';
    echo '<div class="col-md-6">';
    echo '<label for="projects-dropdown">Select a Project:</label>';
    echo '<select id="projects-dropdown" class="form-control">';
    echo '<option value="project1">Project 1</option>';
    echo '<option value="project2">Project 2</option>';
    echo '<option value="project3">Project 3</option>';
    echo '<option value="project4">Project 4</option>';
    echo '<option value="project5">Project 5</option>';
    echo '</select>';
    echo '<div style="max-width: 800px; margin: 20px auto;">';
    echo '<canvas id="projectChart"></canvas>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
?>

<?php
if ($userId != 15) {
echo '<div class="tab-pane fade show active" id="compare-view">';
echo '<!-- Content for Compare View tab -->';
echo '<!-- Dropdown for average team member projects -->';
echo '<div class="row mt-3 hidden" id="projectsDropdownContainer">';
echo '<div class="col-md-6">';
echo '<label for="compare-projects-dropdown">Select a Project:</label>';
echo '<select id="compare-projects-dropdown" class="form-control">';
echo '</select>';
echo '<div style="max-width: 800px; margin: 20px auto;">';
echo '<canvas id="averageProjectChart"></canvas>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
}
?>
            
            
            <!-- Content for Compare View tab 
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
    <script>var userId = <?php echo $userId; ?>;</script> 
    <!-- <script>var userId = 4 </script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="GUIscript.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script><!--
    -->
    
    
    
</body>
</html>


