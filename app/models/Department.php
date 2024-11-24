<?php

class Department
{
	
	use Model;

    protected $table = 'Department';

	protected $allowedColumns = [
		'Id',
		'Name',
		'Mgr_id',
		'Mgr_start_date'
	];

    public function from_id($id)
    {
        $usr = new Account();

        if ($usr == false || !is_numeric($id)) {
            return false;
        }

        return $this->where(["Id" => $id])[0];
    }
}