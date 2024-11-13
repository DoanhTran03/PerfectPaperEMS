<?php
session_start();

$token = $_SESSION["token"];
$token_exp = $_SESSION["expiration"];
$emp_id = 0;
$emp_fname = "";
$emp_lname = "";

if (isset($token) && isset($token_exp)) {
    // Connect to database.
    $mysqli = new mysqli("localhost", "killen2_4150_lab3", "re*WPBtDHEabVG", "killen2_4150_lab3");

    if ($mysqli != false) {
        // Get the account information from the token id.
        $statement = $mysqli->prepare("SELECT Id, Fname, Lname FROM Employee WHERE Id IN (SELECT Id FROM Account WHERE Last_token=? AND Token_expiration > CURRENT_TIMESTAMP() AND Active=1);");
        $statement->bind_param("s", $token);
        $stmt_result = $statement->execute();

        if ($stmt_result) {
            $statement->bind_result($emp_id, $emp_fname, $emp_lname);

            if ($statement->fetch()) {
                // Close the statement so new queries can be sent.
                $statement->close();
            } else {
                echo "could not find!";
            }
        } else {
            session_destroy();
            header("Location: index.php");
        }
    }
} else {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Company Website - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body data-bs-theme="dark">
<nav class="navbar navbar-expand-lg bg-body-secondary sticky-top">
<div class="container-fluid">
    <a class="navbar-brand" href="home.php">Company</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="projects.php">My Projects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tasks.php">My Tasks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="account.php">My Account</a>
            </li>
            <!-- Hidden nav items are placeholders for project phase 3 -->
            <li class="nav-item" hidden>
                <a class="nav-link" href="dependents.php">My Dependents</a>
            </li>
            
            <li class="nav-item" hidden>
                <a class="nav-link" href="admin.php">Admin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="handle_logout.php"><b>Log out</b></a>
            </li>
        </ul>
    </div>
</div>
</nav>

<div class="m-10 p-5 jumbotron d-flex flex-column justify-content-center bg-body-tertiary">
<div class="w-70 h-100 container d-flex flex-column">
    <?php
        echo "<h1 class='mb-4'>Welcome, " . $emp_fname . " " . $emp_lname . "!</h1>";
    ?>
    <!-- Some hardcoded news pieces to add some more content to the home page -->
    <h2>News</h2>
    <div class="w-100 container d-flex flex-row bg-body-light">
    <div class="card bg-dark text-white">
        <img class="card-img-top h-50" src="img/news_img_1.jpg" alt="Major Plant Upgrades Underway">
        <div class="card-body">
            <h5 class="card-title">Major Plant Upgrades Underway</h5>
            <p class="card-text">
                The Production department has been making significant progress on their work towards upgrading the plant with new production lines.
                This change is projected to increase product output by 25% and increase yearly revenue by 16.7% once completed.
            </p>
        </div>
    </div>
    <div class="card bg-dark text-white">
        <img class="card-img-top h-50" src="img/news_img_2.png" alt="Move to ADP">
        <div class="card-body">
            <h5 class="card-title">Move to ADP</h5>
            <p class="card-text">
                HR is currently in the process of transferring the company's HR software to ADP. Please read up on the software and its functionality
                in advance to help facilitate a smooth transition between the old and new system.
            </p>
        </div>
    </div>
</div>
</div>

<div class="p-1 container-fluid bg-body-secondary text-center fixed-bottom">
<footer>
    Copyright: Company 2024
</footer>
</div>
</body>
</html>