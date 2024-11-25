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

    public function get_emp_from_token()
    {
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

    public function set_address($addr)
    {
        $emp = $this->get_emp_from_token();

        if ($emp == false) {
            return false;
        }

        return $this->update($emp->Id, ["Address" => $addr]);
    }

    public function is_admin()
    {
        $emp = $this->get_emp_from_token();

        if ($emp == false) {
            return false;
        }

        if ($emp->Is_admin) {
            return true;
        }

        return false;
    }

    public function get_all()
    {
        if (!$this->is_admin()) {
            return false;
        }

        return $this->query("SELECT * FROM Employee;");
    }

    public function update_info($id, $data)
    {
        if (!$this->is_admin()) {
            return false;
        }

        return $this->update($id, $data);
    }

    public function delete_from_id($id)
    {
        if (!$this->is_admin()) {
            return false;
        }

        $acc = new Account();
        $acc->query("DELETE FROM Account WHERE Employee_id = :emp_id;", [":emp_id" => $id]);
        return $this->query("DELETE FROM Employee WHERE Id = :emp_id;", [":emp_id" => $id]);
    }
}