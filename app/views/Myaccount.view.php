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
    <div class="my-2 alert alert-danger p-2" id="err_box" hidden></div>
    <h2 class="my-2">Basic Information</h2>
    <form class = "mt-2" id="info_form" method="POST">
        <div class="form-group">
            <label for="usr_id"><b>Employee Id</b></label>
            <input type="text" class="form-control my-2" id="usr_id" name="usr_id" placeholder="" disabled>
            <label for="usr_fname"><b>First Name</b></label>
            <input type="text" class="form-control my-2" id="usr_fname" name="usr_fname" placeholder="" disabled>
            <label for="usr_lname"><b>Last Name</b></label>
            <input type="text" class="form-control my-2" id="usr_lname" name="usr_lname" placeholder="" disabled>
            <label for="usr_bdate"><b>Birth Date</b></label>
            <input type="text" class="form-control my-2" id="usr_bdate" name="usr_bdate" placeholder="" disabled>
            <label for="usr_sex"><b>Sex</b></label>
            <input type="text" class="form-control my-2" id="usr_sex" name="usr_sex" placeholder="" disabled>
            <label for="usr_ssn"><b>SSN</b></label>
            <input type="text" class="form-control my-2" id="usr_ssn" name="usr_ssn" placeholder="" disabled>
            <label for="usr_dept"><b>Department</b></label>
            <input type="text" class="form-control my-2" id="usr_dept" name="usr_dept" placeholder="" disabled>
            <label for="usr_salary"><b>Salary</b></label>
            <input type="text" class="form-control my-2" id="usr_salary" name="usr_salary" placeholder="" disabled>
            <label for="usr_addr"><b>Address</b></label>
            <input type="text" class="form-control my-2" id="usr_addr" name="usr_addr">
        </div>

        <button type="submit" class="my-2 btn btn-primary">Update</button>
    </form>
    <script type = "text/javascript">
        $.get("./myaccount/get_info", function (data) {
            var ret_data = JSON.parse(data);   
            var usr_data = ret_data[0]; 
            var dept_data = ret_data[1];

            $("#usr_id").val(usr_data.Id);
            $("#usr_fname").val(usr_data.Fname);
            $("#usr_lname").val(usr_data.Lname);
            $("#usr_bdate").val(usr_data.Bdate);
            $("#usr_sex").val(usr_data.Sex);
            $("#usr_ssn").val(usr_data.Ssn);
            $("#usr_dept").val(dept_data.Name);
            $("#usr_salary").val(usr_data.Salary);
            $("#usr_addr").val(usr_data.Address);
        });
    </script>
    <h2 class="my-2">Change Password</h2>
    <form class = "mt-2" id="pwd_form" method="POST">
        <div class = "form-group">
            <label for="usr_old_pwd"><b>Current Password</b></label>
            <input type="password" class="form-control my-2" id="usr_old_pwd" name="usr_old_pwd">
            <label for="usr_new_pwd1"><b>New Password</b></label>
            <input type="password" class="form-control my-2" id="usr_new_pwd1" name="usr_new_pwd1">
            <label for="usr_new_pwd2"><b>New Password (repeat)</b></label>
            <input type="password" class="form-control my-2" id="usr_new_pwd2" name="usr_new_pwd2">
        </div>

        <button type="submit" class="my-2 btn btn-danger">Change Password</button>
    </form>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#info_form").on("submit", function (evt) {
                evt.preventDefault();
                $.post("./myaccount/change_info", $("#info_form").serialize(), function (data, status) {
                    var result = JSON.parse(data);

                    if (result.result === "Error") {
                        $("#err_box").html("<b>" + result.msg + "</b>");
                        $("#err_box").attr("hidden", false);
                    } else {
                        $("#err_box").attr("hidden", true);
                    }

                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                });
                return false;
            });

            $("#pwd_form").on("submit", function (evt) {
                evt.preventDefault();
                $.post("./myaccount/change_password", $("#pwd_form").serialize(), function (data, status) {
                    var result = JSON.parse(data);

                    if (result.result === "Error") {
                        $("#err_box").html("<b>" + result.msg + "</b>");
                        $("#err_box").attr("hidden", false);
                    } else {
                        $("#err_box").attr("hidden", true);
                        $("#usr_old_pwd").val("");
                        $("#usr_new_pwd1").val("");
                        $("#usr_new_pwd2").val("");
                    }

                    $('html, body').animate({ scrollTop: 0 }, 'fast');
                });
                return false;
            });
        });
    </script>
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