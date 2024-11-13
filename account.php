<?php
session_start();

$token = $_SESSION["token"];
$token_exp = $_SESSION["expiration"];
$emp_id = 0;
$emp_fname = "";
$emp_lname = "";

// Connect to database.
$secret = file_get_contents("secret.txt");
$mysqli = new mysqli("localhost", "killen2_4150_lab3", $secret, "killen2_4150_lab3");

if ($mysqli == false) {
    session_destroy();
    header("Location: index.php");
}

if (isset($token) && isset($token_exp)) {
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
            session_destroy();
            header("Location: index.php");
        }
    } else {
        session_destroy();
        header("Location: index.php");
    }
} else {
    session_destroy();
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Company Website - My Account</title>
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
                <a class="nav-link">My Account</a>
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
<div class="w-50 h-100 container d-flex flex-column">
    <h2 class="mb-4">My Account</h2>
    <form class = "mt-2" action="handle_login.php" method="POST">
        <div class="form-group">
            <?php
                $statement = $mysqli->prepare("SELECT Ssn, Address, Bdate, Sex FROM Employee WHERE Id=?");
                $statement->bind_param("i", $emp_id);
                $stmt_result = $statement->execute();

                if ($stmt_result) {
                    $ssn = "";
                    $address = "";
                    $bdate = "";
                    $sex = "";

                    $statement->bind_result($ssn, $address, $bdate, $sex);

                    if ($statement->fetch()) {
                        echo "<label for='empId'><b>Employee Id</b></label><input type='text' class='form-control my-2' id='empId' name='empId' value='" . $emp_id . "'disabled>";
                        echo "<label for='empFname'><b>First Name</b></label><input type='text' class='form-control my-2' id='empFname' name='empFname' value='" . $emp_fname . "'disabled>";
                        echo "<label for='empLname'><b>Last Name</b></label><input type='text' class='form-control my-2' id='empLname' name='empLname' value='" . $emp_lname . "'disabled>";
                        echo "<label for='empSsn'><b>Social Security Number</b></label><input type='text' class='form-control my-2' id='empSsn' name='empSsn' value='" . $ssn . "'disabled>";
                        echo "<label for='empAddr'><b>Address</b></label><input type='text' class='form-control my-2' id='empAddr' name='empAddr' value='" . $address . "'disabled>";
                        echo "<label for='empBdate'><b>Birth Date</b></label><input type='text' class='form-control my-2' id='empBdate' name='empBdate' value='" . $bdate . "'disabled>";
                        echo "<label for='empSex'><b>Sex</b></label><input type='text' class='form-control my-2' id='empSex' name='empSex' value='" . $sex . "'disabled>";
                    } else {
                        echo "<b>Error: could not load account data.</b>";
                    }
                } else {
                    echo "<b>Error: could not load account data.</b>";
                }
            ?>
        </div>
    </form>
    
</div>
</div>

<div class="p-1 container-fluid bg-body-secondary text-center fixed-bottom">
<footer>
    Copyright: Company 2024
</footer>
</div>
</body>
</html>