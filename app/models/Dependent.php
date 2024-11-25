<?php

class Dependent {
    use Model;

    protected $table = 'Dependent';

	protected $allowedColumns = [
		'Id',
		'Name',
		'Sex',
		'Bdate'
	];

    public function from_token()
    {
        $emp = new Employee();
        $emp_data = $emp->get_emp_from_token();

        if ($emp_data != false) {
            $dep_data = $this->query("SELECT Name, Sex, Bdate FROM Dependent WHERE Id IN (SELECT Dependent_id FROM Employee_Dependent WHERE Employee_id = :emp_id);", [":emp_id" => $emp_data->Id]);

		    if (empty($dep_data)) {
			    return false;
		    }

            return $dep_data;
        }

        return false;
    }
}