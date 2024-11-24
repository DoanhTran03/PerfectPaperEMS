<?php


/**
 * Account class
 */
class Account
{

	use Model;

	protected $table = 'Account';

	protected $allowedColumns = [
		'Id',
		'Employee_id',
		'Pass_hash',
		'Last_token',
		'Token_expiration',
		'Active'
	];

	// Attempt to log in with the given employee id and password.
	public function log_in($emp_id, $pass)
	{
		// Check if the an account exists for that employee id.
		$results = $this->where(["Employee_id" => $emp_id]);
		$user = $results[0];
		$user = $results[0];

		if (empty($user)) {
			return false;
		}

		// If so, check the given password with the stored hash.
		if (password_verify($pass, $user->Pass_hash)) {
			// If logging in was successful, generate a random token and set the expiration date.
			$token = bin2hex(random_bytes(32));
			$_SESSION["token"] = $token;
			$expiration = date("Y-m-d H:i:s", strtotime("+30 minutes"));
			$_SESSION["expiration"] = $expiration;
			// Update these values in the Account table.
			$this->update($user->Id, ["Last_token" => $token, "Token_expiration" => $expiration]);
			return true;
		}

		return false;
	}

	// Gets an object for the Account entry associated with the current token.
	public function user_from_token()
	{
		if (!isset($_SESSION["token"]) || !isset($_SESSION["expiration"])) {
			return false;
		}

		$token = $_SESSION["token"];
		$expiration = $_SESSION["expiration"];

		$results = $this->where(["Last_token" => $token, "Token_expiration" => $expiration]);
		$user = $results[0];

		if (empty($user)) {
			return false;
		}

		return $user;
	}

	// Check to make sure the token and expiration are still valid.
	public function is_logged_in()
	{
		$user = $this->user_from_token();

		if ($user == false) {
			return false;
		}

		$cur_time = date("Y-m-d H:i:s");
		$expiration_dt = $user->Token_expiration;

		if ($cur_time > $expiration_dt) {
			return false;
		}

		return true;
	}

	public function log_out()
	{
		$user = $this->user_from_token();
		session_unset();

		if ($user != false) {
			// Clear the token details so we know the token is no longer valid.
			$this->update($user->Id, ["Last_token" => NULL, "Token_expiration" => NULL]);
			return true;
		}

		return false;
	}

	public function create_user($data)
	{
		$data["Pass_hash"] = password_hash($data["Pass_hash"], PASSWORD_DEFAULT);

		return $this->insert($data);
	}
}