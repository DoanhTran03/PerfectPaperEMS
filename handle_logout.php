<?php
session_start();

// Connect to database.
$mysqli = new mysqli("localhost", "killen2_4150_lab3", "re*WPBtDHEabVG", "killen2_4150_lab3");

if ($mysqli == false) {
    session_destroy();
    header("Location: index.php");
}

if (isset($_SESSION["token"])) {
    $token = $_SESSION["token"];

    $statement = $mysqli->prepare("UPDATE Account SET Last_token=NULL, Token_expiration=NULL WHERE Last_token=?");
    $statement->bind_param("s", $token);
    $stmt_result = $statement->execute();

    if ($stmt_result) {
        $statement->close();
    }
}

session_destroy();
header("Location: index.php");
?>