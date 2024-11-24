<?php


/**
 * User class
 */
class Employee
{

    use Model;

    protected $table = 'Employee';

    protected $allowedColumns = [
        'Id',
        'Fname',
        'Lname',
        'Ssn',
        'Bdate',
        'Address',
        'Sex',
        'Salary',
        'Dept_id',
        'Is_admin'
    ];

    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['email'])) {
            $this->errors['email'] = "Email is required";
        } else
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $this->errors['email'] = "Email is not valid";
            }

        if (empty($data['password'])) {
            $this->errors['password'] = "Password is required";
        }

        if (empty($data['terms'])) {
            $this->errors['terms'] = "Please accept the terms and conditions";
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }

    public function get_emp_from_token() {
        $acc = new Account();
        $usr_data = $acc->user_from_token();

        if ($usr_data != false) {
            $results = $this->where(["Id" => $usr_data->Employee_id]);
		    $emp = $results[0];

		    if (empty($emp)) {
			    return false;
		    }

            return $emp;
        }

        return false;
    }
}