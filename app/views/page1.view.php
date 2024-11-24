<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <section>
        <div class="container-md mt-3 mx-auto">
            <form id="ss_form">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="ss_input" class="form-label">Security Number</label>
                        <input name="ss_input" type="number" class="form-control" id="ss_input"
                            placeholder="Please enter Employee's Social Security Number">
                    </div>
                </div>

                <div class="d-flex justify-content-start" style="gap: 20px">
                    <div class="ml-2">
                        <button id="clear_btn" type="button" class="btn btn-outline" data-dismiss="modal"><i
                                class="ti-arrow-left"></i>
                            CLEAR</button>
                    </div>
                    <button type="submit" class="btn btn-primary float-right" id="btnSubmitComment8A"><i
                            class="ti-save"></i>
                        SEARCH</button>
                </div>
            </form>
            <div class="mt-3">
                <h3 class="text-center mt-4">Employee Details</h3>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lname" disabled>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="fname" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Address</label>
                            <input type="text" class="form-control" id="adr" disabled>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Salary</label>
                            <input type="text" class="form-control" id="slr" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>

<script type="text/javascript">

    $('#ss_form').submit(function (e) {
        e.preventDefault();
        var value = $("#ss_input").val();
        let form = $(this).serializeArray();

        $.ajax({
            url: "https://tran97.myweb.cs.uwindsor.ca/public/EmployeeController/getEmployeeBySS",
            method: "get",
            data: form,
            dataType: "json"
        })
            .done((data) => {
                var employee = data[0];
                if (data) {
                    $("#lname").val(employee['Lname']);
                    $("#fname").val(employee['Fname']);
                    $("#adr").val(employee['Address']);
                    $("#slr").val(employee['Salary']);

                    console.log(data);
                } else {
                    alert("There is no employee that match the Social Security number")
                }
            })
            .fail(() => {
                alert("There is network error");
            });
    });

    $("#clear_btn").click(function (e) {
        $("#ss_input").val('');
        $("#lname").val('');
        $("#fname").val('');
        $("#adr").val('');
        $("#slr").val('');
    })

</script>

</html>