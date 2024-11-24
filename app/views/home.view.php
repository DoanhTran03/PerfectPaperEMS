<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="d-flex flex-column justify-content-center container-sm" style="gap: 10px">
        <h3 class="text-center mb-4">Database searching system</h3>
        <button id="btn_1" type="button" class="btn btn-primary">Get Employee by Social Security</button>
        <button id="btn_2" type="button" class="btn btn-primary">Search Projects attached to a Employee by Social
            Security
            Number</button>
        <button id="btn_3" type="button" class="btn btn-primary">Search Dependents from Employee Social Security
            Number</button>
        <button id="btn_4" type="button" class="btn btn-primary">Test tab</button>
    </div>

</html>
</body>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function () {

    });

    $("#btn_1").on("click", function () {
        window.location.href = "https://tran97.myweb.cs.uwindsor.ca/public/Home/getPage1";
    })

    $("#btn_2").on("click", function () {
        console.log("The second button is clicked");
        window.location.href = "https://tran97.myweb.cs.uwindsor.ca/public/Home/getPage2";
    })

    $("#btn_3").on("click", function () {
        console.log("The third button is clicked");
        window.location.href = "https://tran97.myweb.cs.uwindsor.ca/public/Home/getPage3";
    })

    $("#btn_4").on("click", function () {
        console.log("The third button is clicked");
        window.location.href = "https://tran97.myweb.cs.uwindsor.ca/public/Home/getPage4";
    })

</script>