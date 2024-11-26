<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfect Paper - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body data-bs-theme="dark">
<nav class="navbar navbar-expand-lg bg-body-secondary sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo ROOT . "public" ?>">Perfect Paper</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo ROOT . "public/projects"?>">My Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo ROOT . "public/tasks"?>">My Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo ROOT . "public/myaccount"?>">My Account</a>
                </li>

                <?php
                    $emp = new Employee();

                    if ($emp->is_admin()) {
                        echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"" . ROOT . "public/admin\">Admin</a></li>";
                    }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo ROOT . "public/logout"?>"><b>Log out</b></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="m-10 p-5 jumbotron d-flex flex-column justify-content-center bg-body-tertiary">
<div class="w-70 h-100 container d-flex flex-column">
    <?php
        $emp = new Employee();
        $emp_data = $emp->get_emp_from_token();

        echo "<h1 class='mb-4'>Welcome, " . $emp_data->Fname . " " . $emp_data->Lname . "!</h1>";
    ?>
    <!-- Some hardcoded news pieces to add some more content to the home page -->
    <h2>News</h2>
    <div class="w-100 container d-flex flex-row bg-body-light">
            <!-- Some hardcoded news pieces to add some more content to the home page -->
            <div class="card bg-dark text-white">
                <img class="card-img-top h-50" src="<?php echo ROOT ?>public/img/news_img_1.jpg" alt="Major Plant Upgrades Underway">
                <div class="card-body">
                    <h5 class="card-title">Major Plant Upgrades Underway</h5>
                    <p class="card-text">
                        The Production department has been making signifcant progress on their work towards
                        upgrading the plant with new production lines.
                        This change is projected to increase productoutput by 25% and increase yearly revenue by
                        16.7% once completed.
                    </p>
                </div>
            </div>
            <div class="card bg-dark text-white">
                <img class="card-img-top h-50" src="<?php echo ROOT ?>public/img/news_img_2.png" alt="Move to ADP">
                <div class="card-body">
                    <h5 class="card-title">Move to ADP</h5>
                    <p class="card-text">
                            HR is currently in the process of transferring the company's HR software to ADP. Please read
                            up on the software and its functionality
                            in advance to help facilitate a smooth transition between the old and new system.
                    </p>
                </div>
            </div>
        </div>

        <div class="p-1 container-fluid bg-body-secondary text-center fixed-bottom">
            <footer>
                Copyright: Perfect Paper 2024
            </footer>
        </div>
</body>

</html>