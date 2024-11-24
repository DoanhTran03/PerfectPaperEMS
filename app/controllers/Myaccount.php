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
            header("Location: ../login");
        }
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
                echo json_encode($emp_data);
            } else {
                header("Location: ../myaccount");
            }
        }

        exit;
    }
}