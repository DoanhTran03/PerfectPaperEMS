<?php
session_start();

$login_id = $_POST["loginId"];
$login_pass = $_POST["loginPassword"];

function handle_err($error) {
    session_destroy();
    header("Location: index.php?err=" . $error);
}

// Make sure the id and password are passed in the POST request. Make sure the id is numeric.
if (!empty($login_id) && !empty($login_pass) && is_numeric($login_id)) {
    // Connect to database.
    $secret = file_get_contents("secret.txt");
    $mysqli = new mysqli("localhost", "killen2_4150_lab3", $secret, "killen2_4150_lab3");

    if ($mysqli != false) {
        // Get the password hash and account id of the employee with the given id from the request.
        $statement = $mysqli->prepare("SELECT Id, Pass_hash FROM Account WHERE Employee_id=? AND Active = 1 LIMIT 1;");
        $statement->bind_param("i", $login_id);
        $stmt_result = $statement->execute();

        if ($stmt_result) {
            $account_id = 0;
            $pass_hash = "";

            $statement->bind_result($account_id, $pass_hash);
            if ($statement->fetch()) {
                // Close the statement so new queries can be sent.
                $statement->close();
                // If the password given matches the hash stored in the database, set up a session.
                if (password_verify($login_pass, $pass_hash)) {
                    $_SESSION["token"] = bin2hex(random_bytes(32));
                    $_SESSION["started"] = date("Y-m-d H:i:s", time());
                    $_SESSION["expiration"] = date("Y-m-d H:i:s", strtotime("+30 minutes"));

                    // Update the token and its expiration date.
                    $statement = $mysqli->prepare("UPDATE Account SET Last_token=?, Token_expiration=? WHERE Id=?");
                    $statement->bind_param("ssi", $_SESSION["token"], $_SESSION["expiration"], $account_id);
                    $stmt_result = $statement->execute();

                    if ($stmt_result) {
                        header("Location: home.php");
                    } else {
                        handle_err(5);
                    }
                } else {
                    handle_err(5);
                }
            } else {
                handle_err(4);
            }
        } else {
            handle_err(3);
        }
    } else {
        handle_err(2);
    }
} else {
    handle_err(1);
}

?>