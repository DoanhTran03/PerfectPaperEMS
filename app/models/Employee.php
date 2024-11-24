<?php


/**
 * User class
 */
class oEmployee
{
    public $Id = '';
    public $Fname = '';
    public $Minit = '';
    public $Lname = '';
    public $Ssn = '';
    public $Bdate = '';
    public $Address = '';
    public $Sex = '';
    public $Salary = '';
    public $Dno = '';
    public $Is_admin = '';

}

class Employee
{
    use Model;

    protected $table = 'Employee';

    protected $allowedColumns = [];

    public function getEmployeeBySSN($ssn)
    {
        $data = array(
            "Ssn" => $ssn,
        );

        $result = $this->where($data);

        return $result;
    }

}