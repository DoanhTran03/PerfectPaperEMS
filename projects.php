<?php
session_start();

$token = $_SESSION["token"];
$token_exp = $_SESSION["expiration"];
$emp_id = 0;
$emp_fname = "";
$emp_lname = "";

// Connect to database.
$mysqli = new mysqli("localhost", "killen2_4150_lab3", "re*WPBtDHEabVG", "killen2_4150_lab3");

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
    <title>Company Website - My Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body data-bs-theme="dark">
<nav class="navbar navbar-expand-lg bg-body-secondary sticky-top">
<div class="container-fluid">
    <a class="navbar-brand" href="home.php">Company</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link">My Projects</a>
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
    <h2 class="mb-4">My Projects</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Department</th>
                <th scope="col">Location</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Get projects
                $statement = $mysqli->prepare("SELECT Project.Id, Project.Name, Department.Name, Project.Location FROM Project INNER JOIN Department ON Project.Dept_id = Department.Id WHERE Project.Id IN (SELECT Proj_id FROM Works_On WHERE Employee_id = ?);");
                $statement->bind_param("i", $emp_id);
                $stmt_result = $statement->execute();

                if ($stmt_result) {
                    $proj_id = 0;
                    $proj_name = "";
                    $dept_name = "";
                    $proj_loc = "";

                    $statement->bind_result($proj_id, $proj_name, $dept_name, $proj_loc);

                    while($statement->fetch()) {
                        echo "<tr><td>" . $proj_id . "</td>";
                        echo "<td>" . $proj_name . "</td>";
                        echo "<td>" . $dept_name . "</td>";
                        echo "<td>" . $proj_loc . "</td></tr>";
                    }
                } else {
                    echo "<tr><td>Error retrieving data.</td></tr>";
                }
            ?>
        </tbody>
    </table>
</div>
</div>

<div class="p-1 container-fluid bg-body-secondary text-center fixed-bottom">
<footer>
    Copyright: Company 2024
</footer>
</div>
</body>
</html>