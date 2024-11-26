<?php

/**
 * Login class
 */
class Login
{
	use Controller;

	public function index()
	{
		// $usr = new Account();
		// try {
		// 	$userdata = array(
		// 		"Employee_id" => 15,
		// 		"Pass_hash" => "1234",
		// 		"Last_token" => null,
		// 		"Token_experation" => null,
		// 		"Active" => 1
		// 	);
		// 	echo "It reached here";
		// 	echo $usr->create_user($userdata);
		// } catch (Exception $e) {
		// 	print $e->getMessage();
		// }
		$this->view(get_class($this));
	}

	public function auth()
	{
		$usr = new Account();

		// Check if the user is logged in.
		if ($usr->is_logged_in()) {
			echo "{\"result\": \"Error\", \"msg\":\"Already logged in.\"}";
			// If they are not, check if they sent data through the login form.
		} else if (isset($_POST["usr_id"]) && isset($_POST["usr_pass"])) {
			$usr_id = $_POST["usr_id"];
			$usr_pass = $_POST["usr_pass"];

			// Attempt to log in with form data.
			if ($usr->log_in($usr_id, $usr_pass)) {
				echo "{\"result\": \"Success\"}";
			} else {
				echo "{\"result\": \"Error\", \"msg\":\"Failed to log in. Check your connection and credentials.\"}";
			}
		}
	}
}
