<?php

class Myaccount
{
	use Controller;

	public function index()
	{
        $usr = new Account();
        // Check if the user is logged in.
		if ($usr->is_logged_in()) {
            $this->view(get_class($this));
        } else {
            header("Location: ./login");
        }
    }

    public function change_info()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $usr = new Account();
            // Check if the user is logged in.
		    if (!$usr->is_logged_in()) {
                echo "{\"result\": \"Error\", \"msg\": \"Failed to authenticate token.\"}";
            }

            if (isset($_POST["usr_addr"])) {
                $emp = new Employee();
                $emp_data = $emp->get_emp_from_token();
                
                if ($_POST["usr_addr"] != "" && $_POST["usr_addr"] != $emp_data->Address) {
                    echo json_encode($emp->set_address($_POST["usr_addr"]));
                } else {
                    echo "{\"result\": \"Error\", \"msg\": \"Failed to verify password credentials.\"}";
                }
            }
        }

        exit;
    }

    public function change_password()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $usr = new Account();
            // Check if the user is logged in.
		    if (!$usr->is_logged_in()) {
                echo "{\"result\": \"Error\", \"msg\": \"Failed to authenticate token.\"}";
            }
        
            if (isset($_POST["usr_old_pwd"]) && isset($_POST["usr_new_pwd1"]) && isset($_POST["usr_new_pwd2"])) {
                $old_pwd = $_POST["usr_old_pwd"];
                $new_pwd = $_POST["usr_new_pwd1"];
                $new_pwd2 = $_POST["usr_new_pwd2"];
                $usr_data = $usr->user_from_token();

                if (password_verify($old_pwd, $usr_data->Pass_hash) && $new_pwd == $new_pwd2) {
                    $usr->set_password($new_pwd);
                    echo "{\"result\": \"Success\"}";
                } else {
                    echo "{\"result\": \"Error\", \"msg\": \"Failed to verify password credentials.\"}";
                }
            }
        }

        exit;
    }

    public function get_info()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $usr = new Account();
            // Check if the user is logged in.
		    if (!$usr->is_logged_in()) {
                header("Location: ../login");
            }

            $emp = new Employee();
            $emp_data = $emp->get_emp_from_token();

            if ($emp_data != false) {
                $dept = new Department();
                $dept_data = $dept->from_id(intval($emp_data->Dept_id));

                if ($dept_data != false) {
                    echo json_encode([$emp_data, $dept_data]);
                }
            } else {
                header("Location: ../myaccount");
            }
        }

        exit;
    }
}