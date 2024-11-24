<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfect Paper - My Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body data-bs-theme="dark">
    <nav class="navbar navbar-expand-lg bg-body-secondary sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="./">Perfect Paper</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href=<?php echo ROOT . "/projects" ?>>My Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=<?php echo ROOT . "/tasks" ?>>My Tasks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">My Account</a>
                    </li>
                    <li class="nav-item" hidden>
                        <a class="nav-link" href=<?php echo ROOT . "/admin" ?>>Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=<?php echo ROOT . "/logout" ?>><b>Log out</b></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="m-10 p-5 jumbotron d-flex flex-column justify-content-center bg-body-tertiary">
        <div class="w-70 h-100 container d-flex flex-column">
            <h1 class='mb-4'>My Account</h1>
            <h2 class="my-2">Basic Information</h2>
            <form class="mt-2" method="POST">
                <div class="form-group">
                    <label for="usr_id"><b>Employee Id</b></label>
                    <input type="text" class="form-control my-2" id="usr_id" name="usr_id" placeholder="" disabled>
                    <label for="usr_fname"><b>First Name</b></label>
                    <input type="text" class="form-control my-2" id="usr_fname" name="usr_fname" placeholder=""
                        disabled>
                    <label for="usr_lname"><b>Last Name</b></label>
                    <input type="text" class="form-control my-2" id="usr_lname" name="usr_lname" placeholder=""
                        disabled>
                    <label for="usr_dept"><b>Department</b></label>
                    <input type="text" class="form-control my-2" id="usr_dept" name="usr_dept" placeholder="" disabled>
                    <label for="usr_salary"><b>Salary</b></label>
                    <input type="text" class="form-control my-2" id="usr_salary" name="usr_salary" placeholder=""
                        disabled>
                    <label for="usr_addr"><b>Address</b></label>
                    <input type="text" class="form-control my-2" id="usr_addr" name="usr_addr">
                </div>

                <button type="submit" class="my-2 btn btn-primary">Update</button>
            </form>
            <script type="text/javascript">
                $.get("./myaccount/get_info", function (data) {
                    var usr_data = JSON.parse(data);

                    $("#usr_id").val(usr_data.Id);
                    $("#usr_fname").val(usr_data.Fname);
                    $("#usr_lname").val(usr_data.Lname);
                    $("#usr_dept").val(usr_data.Dept_id);
                    $("#usr_salary").val(usr_data.Salary);
                    $("#usr_addr").val(usr_data.Address);
                });
            </script>
            <h2 class="my-2">Change Password</h2>
            <form class="mt-2" method="POST">
                <div class="form-group">
                    <label for="usr_old_pwd"><b>Current Password</b></label>
                    <input type="text" class="form-control my-2" id="usr_old_pwd" name="usr_old_pwd">
                    <label for="usr_new_pwd1"><b>New Password</b></label>
                    <input type="text" class="form-control my-2" id="usr_new_pwd1" name="usr_new_pwd1">
                    <label for="usr_new_pwd2"><b>New Password (repeat)</b></label>
                    <input type="text" class="form-control my-2" id="usr_new_pwd2" name="usr_new_pwd2">
                </div>

                <button type="submit" class="my-2 btn btn-danger">Change Password</button>
            </form>
            <h2 class="my-2">Dependents</h2>
        </div>
    </div>

    <div class="p-1 container-fluid bg-body-secondary text-center fixed-bottom">
        <footer>
            Copyright: Perfect Paper 2024
        </footer>
    </div>
</body>

</html>