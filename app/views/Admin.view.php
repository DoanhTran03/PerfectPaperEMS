<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfect Paper - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body data-bs-theme="dark">
    <!-- Modal -->
    <div class="modal fade show" data-backdrop="false" id="modal_task_review" tabindex="-1" style="display: none;"
        role="dialog">
        <form id="form_detail_review">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Employee</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="t_id" name="t_id" value="" />

                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="t_emp_id" class="form-label">Id</label>
                                        <input name="t_emp_id" type="text" class="form-control" id="t_emp_id"
                                            placeholder="" disabled>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="t_fname" class="form-label">First Name</label>
                                        <input name="t_fname" type="text" class="form-control" id="t_fname"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="t_lname" class="form-label">Last Name</label>
                                        <input name="t_lname" type="text" class="form-control" id="t_lname"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="t_bdate" class="form-label">Birth Date</label>
                                        <input name="t_bdate" type="text" class="form-control" id="t_bdate"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="t_address" class="form-label">Address</label>
                                        <input name="t_address" type="text" class="form-control" id="t_address"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="t_salary" class="form-label">Salary</label>
                                        <input name="t_salary" type="text" class="form-control" id="t_salary"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="t_admin" class="form-label">Admin</label>
                                        <input name="t_admin" type="text" class="form-control" id="t_admin"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline btn_exit" data-dismiss="modal"><i
                                class="ti-arrow-left"></i> EXIT</button>
                        <button type="submit" class="btn btn-success float-right" id="btn_Review"><i
                                class="ti-save"></i> UPDATE</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- End Modal -->

    <nav class="navbar navbar-expand-lg bg-body-secondary sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="./">Perfect Paper</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="./projects">My Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./tasks">My Tasks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./myaccount">My Account</a>
                    </li>
                    <?php
                        $emp = new Employee();

                        if ($emp->is_admin()) {
                            echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"./admin\">Admin</a></li>";
                        }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="./logout"><b>Log out</b></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="m-10 p-5 jumbotron d-flex flex-column justify-content-center bg-body-tertiary">
        <div class="w-70 h-100 container d-flex flex-column">
            <h1 class='mb-4'>Admin Panel</h1>
            <button class="my-2 btn btn-success" style="max-width: 10vw;">New Employee</button>
            <div class="container-md">
                <div class="tab-pane mt-4 active" id="tabComment" role="tabpanel">
                    <div class="table-responsive">
                        <table id="tbl_EmployeeList"
                            class="display table table-hover table-condensed table-striped table-bordered">
                            <thead class="bg-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Birth Date</th>
                                    <th>Address</th>
                                    <th>Salary</th>
                                    <th>Admin</th>
                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
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

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />

<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

<script type="text/javascript">
    tblProjectList = $('#tbl_EmployeeList').DataTable({
        // "processing": true,
        // "serverSide": true,
        "bPaginate": false, //hide pagination
        "searchDelay": 500,
        "ajax": {
            "url": "<?php echo ROOT . "/public/admin/get_employees" ?>",
            "type": "GET",
            "data": (d) => {
                return $.extend({}, d, {
                });
            },
            "datatype": "json",
            dataSrc: (json) => {
                console.log(json);
                json.forEach(element => {
                    element.id = element.Id,
                    element.fname = element.Fname
                    element.lname = element.Lname,
                    element.bdate = element.Bdate,
                    element.address = element.Address,
                    element.salary = element.Salary,
                    element.is_admin = element.Is_admin,
                    element.Method =
                        `<div class="d-flex flex-row justify-content-center align-items-center" style="gap: 10px">
                    <button type="button" class="btn btn-primary btn_update">Update</button>
                    <button type="button" class="btn btn-danger btn_del">Delete</button>
                    </div>`;
                });
                return json;
            },
            complete: (json) => {
            }
        },
        "order": [
            [1, "asc"]
        ],
        "aoColumnDefs": [
            {
                "className": "text-center",
                "orderable": true,
                "targets": [0, 1, 2, 3, 4, 5, 6]
            },
            {
                "className": "text-center",
                "width": "15%",
                "orderable": false,
                "targets": [7]
            }
        ],
        "columns": [
            { "data": "id" },
            { "data": "fname" },
            { "data": "lname" },
            { "data": "bdate" },
            { "data": "address" },
            { "data": "salary" },
            { "data": "is_admin" },
            { "data": "Method" }
        ],
    });

    $(document).ready(function () {
        // console.log("Everything have been loaded");
        // $.ajax({
        //     url: 
        //     method: "GET",
        //     data: {
        //     },
        //     dataType: "json"
        // })
        //     .done(function (message) {
        //         alert(message);
        //     })
        //     .fail(() => {
        //         alert("There is a error on network, please reload the page");
        //     });
    });

    $("#tbl_EmployeeList").on("click", ".btn_update", function (e) {
        var obj = $(e.delegateTarget).DataTable().row($(this).parents('tr')).data();
        console.log(obj);
        $("#t_id").val(obj.Id);
        $("#t_fname").val(obj.Fname);
        $("#t_lname").val(obj.Lname);
        $("#t_bdate").val(obj.Bdate);
        $("#t_address").val(obj.Address);
        $("#t_salary").val(obj.Salary);
        $("#t_admin").val(obj.Is_admin);

        $("#modal_task_review").modal('show');
    });

    $("#tbl_EmployeeList").on("click", ".btn_del", function (e) {
        var obj = $(e.delegateTarget).DataTable().row($(this).parents('tr')).data();

        $.ajax({
            url: "<?php echo ROOT . "/public/admin/delete_employee" ?>",
            method: "POST",
            data: {
                t_id: obj.Id,
            },
            dataType: "json"
        })
            .done(function (message) {
                alert(message);
            })
            .fail(() => {
                alert("There is a error on network, please reload the page");
            });
    });

    $('#form_detail_review').submit(function (e) {
        e.preventDefault();
        $('#btn_Review').attr("disabled", true);
        let form = $(this).serializeArray();
        console.log(form);
        $.ajax({
            "url": "<?php echo ROOT . "/public/admin/update_employee" ?>",
            method: "POST",
            data: form,
            dataType: "json"
        })
            .done(function (message) {
                alert(message);
                $('#tbl_EmployeeList').DataTable().ajax.reload();
            })
            .fail(() => {
                alert("There is a error on network, please reload the page");
            });
        $("#btn_Review").removeAttr("disabled");
    });

    $(".btn_exit").on("click", function () {
        $("#modal_task_review").modal("hide");
    })

</script>