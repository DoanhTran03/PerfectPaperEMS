<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfect Paper - Log in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body data-bs-theme="dark">
<nav class="navbar navbar-expand-lg bg-body-secondary sticky-top">
<div class="container-fluid">
    <a class="navbar-brand" href="home.php">Perfect Paper</a>
</div>
</nav>

<div class="m-10 p-5 jumbotron d-flex flex-column justify-content-center bg-body-tertiary">
<div class="w-50 h-100 container d-flex flex-column">
    <div class="text-primary-emphasis bg-primary-subtle border-primary-subtle rounded-3 p-2">
        Please log in:
    </div>

    <?php
        $err_no = $_GET["error"];
        if (isset($err_no) && is_numeric($err_no) && $err_no > 0) {
            echo "<div class='mt-2 alert alert-danger p-2'>" . "Failed to log in. Error code: " . $err_no . "</div>";
        }
    ?>
    
    <form class = "mt-2" method="POST">
        <div class="form-group">
            <label for="usr_id"><b>Employee Id</b></label>
            <input type="text" class="form-control my-2" id="usr_id" name="usr_id" placeholder="" required>
            <label for="usr_pass"><b>Password</b></label>
            <input type="password" class="form-control my-2" id="usr_pass" name="usr_pass" required>
        </div>

        <button type="submit" class="my-2 btn btn-primary">Log in</button>
    </form>
</div>
</div>

<div class="p-1 container-fluid bg-body-secondary text-center fixed-bottom">
<footer>
    Copyright: Perfect Paper 2024
</footer>
</div>
</body>
</html>