<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfect Paper - My Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body data-bs-theme="dark">
    <!-- Modal -->
    <div class="modal fade show" data-backdrop="false" id="modal_detail_review" tabindex="-1" style="display: none;"
        role="dialog">
        <form id="form_detail_review">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Project</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="p_num" name="p_num" value="" />


                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="p_name" class="form-label">Project Name</label>
                                        <input name="Pname" type="text" class="form-control" id="p_name" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="p_location" class="form-label">Project Location</label>
                                        <input name="Plocation" type="text" class="form-control" id="p_location"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="p_budget" class="form-label">Budget</label>
                                        <input name="Budget" type="number" class="form-control" id="p_budget"
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
            <!-- Some hardcoded news pieces to add some more content to the home page -->
            <div class="container-md">
                <?php
                $emp = new Employee();
                $emp_data = $emp->get_emp_from_token();

                echo "<h4 class='mb-4'>" . $emp_data->Fname . " " . $emp_data->Lname . "'s projects</h4>";
                ?>
                <div class="tab-pane mt-4 active" id="tabComment" role="tabpanel">
                    <div class="table-responsive">
                        <table id="tbl_ProjectList"
                            class="display table table-hover table-condensed table-striped table-bordered">
                            <thead class="bg-dark">
                                <tr>
                                    <th>Project Name</th>
                                    <th>Project Location</th>
                                    <th>Budget</th>
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
    tblProjectList = $('#tbl_ProjectList').DataTable({
        // "processing": true,
        // "serverSide": true,
        "bPaginate": false, //hide pagination
        "searchDelay": 500,
        "ajax": {
            "url": "<?php echo ROOT . "/public/projects/getProjectsByEmployeeID" ?>",
            "type": "GET",
            "data": (d) => {
                return $.extend({}, d, {
                });
                // return $.extend({}, d, {
                //     "OrderArray": "[ID],[Name], [ResearchProduct], [TypeOfTopic],[RegistrationUnit],[TopicFunding], [FromDate] ,[Status],[CouncilID]",
                //     "__RequestVerificationToken": $("input[name=__RequestVerificationToken]").val(),
                //     "__TypeOfTopic": $("#__TypeOfTopic").val(),
                //     "__ScienceTech": $("#__ScienceTech").val(),
                //     "__RegistrationSession": $("#__RegistrationSession").val(),
                //     "__Year": $("#__Year").val(),
                // });
            },
            "datatype": "json",
            dataSrc: (json) => {
                console.log(json);
                json.forEach(element => {
                    element.name = element.Name,
                        element.location = element.Location,
                        element.budget = element.Budget,
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
                "targets": [0]
            },
            {
                "width": "8%",
                "orderable": false,
                "targets": [3]
            },
            {
                "className": "text-center",
                "targets": [0, 1, 2, 3]
            }
        ],
        "columns": [
            { "data": "name" },
            { "data": "location" },
            { "data": "budget" },
            { "data": "Method" }
        ],
    });

    $(document).ready(function () {
        console.log("Everything have been loaded");
    });

    $("#tbl_ProjectList").on("click", ".btn_update", function (e) {
        var obj = $(e.delegateTarget).DataTable().row($(this).parents('tr')).data();
        $("#p_num").val(obj.Project_id);
        $("#p_name").val(obj.name);
        $("#p_location").val(obj.location);
        $("#p_budget").val(obj.budget);

        $("#modal_detail_review").modal('show');
        // $.ajax({
        //     url: "https://tran97.myweb.cs.uwindsor.ca/public/ProjectController/updateProjectsByProjectNumber",
        //     method: "POST",
        //     data: {
        //         p_num: 2,
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

    $("#tbl_ProjectList").on("click", ".btn_del", function (e) {
        var obj = $(e.delegateTarget).DataTable().row($(this).parents('tr')).data();

        $.ajax({
            url: "<?php echo ROOT . "/public/projects/deleteProjectsByProjectNumber" ?>",
            method: "POST",
            data: {
                p_num: obj.Project_id
            },
            dataType: "json"
        })
            .done(function (message) {
                alert(message);
                $('#tbl_ProjectList').DataTable().ajax.reload();
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
            url: "<?php echo ROOT . "/public/projects/updateProjectsByProjectNumber" ?>",
            method: "POST",
            data: form,
            dataType: "json"
        })
            .done(function (message) {
                alert(message);
                $('#tbl_ProjectList').DataTable().ajax.reload();
            })
            .fail(() => {
                alert("There is a error on network, please reload the page");
            });
        $("#btn_Review").removeAttr("disabled");
    });

    $(".btn_exit").on("click", function () {
        $("#modal_detail_review").modal("hide");
    })

</script>