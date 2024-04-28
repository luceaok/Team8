<?php
if (!defined("MAIN_RAN")) {
    header("Location: /pages/?page=projects");
    die();
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Add Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/jquery-ui-1.13.2.date2/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="projects/add-project-tasks.css">
    <link rel="stylesheet" type="text/css" href="../../global.css">
</head>

<body>
    <h1 class="paragraphdrag">Project Name</h1>

    <p class="paragraphdrag">Fill in the form to create new tasks</p>

    <form>
        <div class="container-custom">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="task_input">Task Name:</label>
                        <input type="text" class="form-control" id="task_input" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="desc_input">Description:</label>
                        <input type="text" class="form-control" id="desc_input" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="datepicker">Start Date:</label>
                        <input type="text" class="form-control date" id="datepicker" required style="width: 150px;">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="datepicker-2">End Date:</label>
                        <input type="text" class="form-control date" id="datepicker-2" required style="width: 150px;">
                    </div>
                </div>
            </div>

            <div class="row">
                <button type="button" style="width: 25%" class="btn btn-sub">Submit</button>
            </div>
        </div>
    </form>

    <div class="d-flex flex-row mb-3" id="small-container">
        <ul id="box" class="sortable">
        </ul>
    </div>

    <h2 class="assign">Assign Tasks</h2>

    <p class="paragraphdrag">Drag and drop to assign tasks</p>

    <div class="d-flex flex-row mb-3" id="big-container">
        <div class="p-2 flex-fill">
            <div class="card">
                <h2 class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>
                </h2>

                <h5 class="card-title">John Cenaa</h5>

                <div class="border-top my-3"></div>

                <ul class="sortable bruh">
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
                <h2 class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>
                </h2>

                <h5 class="card-title">Jean Sienna</h5>

                <div class="border-top my-3"></div>

                <ul class="sortable bruh">
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
                <h2 class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>
                </h2>

                <h5 class="card-title">Jon Seanuh</h5>

                <div class="border-top my-3"></div>

                <ul class="sortable bruh">
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

    <footer>
        <div class="col-md-12 col-sm-12" id="flex-end">
            <button type="button" class="btn btn-complete">Complete</button>
        </div>
    </footer>
</body>

<!-- Add Bootstrap JavaScript and jQuery (required for some Bootstrap components) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="projects/add-project-tasks.js"></script>

</html>
