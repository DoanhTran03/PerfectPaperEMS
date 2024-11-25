<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfect Paper - My Dependents</title>
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
                        <h5 class="modal-title">My Dependents</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="t_id" name="t_id" value="" />

                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="t_name" class="form-label">Name</label>
                                        <input name="t_name" type="text" class="form-control" id="t_name"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="t_sex" class="form-label">Sex</label>
                                        <input name="t_sex" type="text" class="form-control" id="t_sex"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="t_bdate" class="form-label">Bdate</label>
                                        <input name="t_bdate" type="text" class="form-control" id="t_bdate"
                                            placeholder="" disabled>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
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
            <!-- Some hardcoded news pieces to add some more content to the home page -->
            <div class="container-md">
                <?php
                $emp = new Employee();
                $emp_data = $emp->get_emp_from_token();

                echo "<h4 class='mb-4'>" . $emp_data->Fname . " " . $emp_data->Lname . "'s Dependents</h4>";
                ?>
                <div class="tab-pane mt-4 active" id="tabComment" role="tabpanel">
                    <div class="table-responsive">
                        <table id="tbl_DependentList"
                            class="display table table-hover table-condensed table-striped table-bordered">
                            <thead class="bg-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Sex</th>
                                    <th>Bdate</th>
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
    tbldDependentList = $('#tbl_DependentList').DataTable({
        // "processing": true,
        // "serverSide": true,
        "bPaginate": false, //hide pagination
        "searchDelay": 500,
        "ajax": {
            "url": "./dependents/deps_from_token",
            "type": "GET",
            "data": (d) => {
                return $.extend({}, d, {
                });
            },
            "datatype": "json",
            dataSrc: (json) => {
                console.log(json);
                json.forEach(element => {
                    element.name = element.Name,
                    element.sex = element.Sex,
                    element.bdate = element.Bdate
                });
                return json;
            },
            complete: (json) => {
            }
        },
        "order": [
            [0, "asc"]
        ],
        "aoColumnDefs": [
            {
                "className": "text-center",
                "targets": [0, 1, 2]
            }
        ],
        "columns": [
            { "data": "name" },
            { "data": "sex" },
            { "data": "bdate" }
        ],
    });

    $(document).ready(function () {
        // console.log("Everything have been loaded");
        // $.ajax({
        //     url: "<?php echo ROOT . "/public/dependents/deps_from_token" ?>",
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
</script>