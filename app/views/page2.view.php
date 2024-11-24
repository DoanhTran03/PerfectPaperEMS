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

            <form id="ssproject_form">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="ss_num" class="form-label">Security Number</label>
                        <input name="ss_num" type="number" class="form-control" id="ss_num"
                            placeholder="Please enter employee's social security number">
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

            <div class="container my-3 px-0" id="list"></div>
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

    $('#ssproject_form').submit(function (e) {
        e.preventDefault();
        var value = $("#ss_num").val();
        let form = $(this).serializeArray();

        $.ajax({
            url: "https://tran97.myweb.cs.uwindsor.ca/public/ProjectController/getProjectsByEmployeeSSN",
            method: "get",
            data: form,
            dataType: "json"
        })
            .done((data) => {
                if (data) {
                    let list = document.getElementById("list"); // HTML append item
                    //let data = JSON.parse(this.response); // Decode the list from the response
                    list.innerHTML = '<p>No Records found</p>';
                    if (data !== null && data.length > 0) {
                        list.innerHTML = "<h4 class=\"text-center\">Project List</h4>";
                        list.innerHTML += '<ul class="list-group"></ul>';
                        data.forEach((item) => {
                            // Get each list item and display lastname, firstname, address, and salary

                            list.querySelector('.list-group').innerHTML += `<li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <div>Project name: ${item.Pname}</div>
                                    <div>Project Locaiton: ${item.Plocation}</div>
                                    <div>Project Budget: ${item.Budget}</div>
                                </div>
                            </li>`;
                        });
                    }
                } else {
                    list.innerHTML = '<p>No Records found</p>';
                    alert("There is no employee that match the Social Security number")
                }
            })
            .fail(() => {
                alert("There is network error");
            });
    });

    $("#clear_btn").click(function (e) {
        $("#ss_num").val('');
        $("#list").html('');
    })

</script>

</html>