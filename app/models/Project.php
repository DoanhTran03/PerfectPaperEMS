<?php


/**
 * User class
 */
class oProject
{
    public $id;
    public $name;
    public $location;
    public $budget;

    // Constructor to initialize the properties
    public function __construct($id, $name, $age, $budget)
    {
        $this->id = $id;
        $this->name = $name;
        $this->location = $age;
        $this->budget = $budget;
    }

}

class Project
{
    use Model;

    protected $table = 'Project';

    protected $allowedColumns = [];

    public function getProjectsByEmployeeID($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);

        $query = "SELECT P.Id AS Project_id, P.Name, P.Location, P.Budget, E.Ssn
                    FROM 
                        Project AS P
                    INNER JOIN 
                        Works_On AS W
                    ON
                        P.Id = W.Proj_id
                    INNER JOIN 
                        Employee AS E
                    ON W.Employee_id = E.Id WHERE E.Id = :Id";

        // foreach ($keys as $key) {
        //     $query .= $key . " = :" . $key . " && ";
        // }

        // foreach ($keys_not as $key) {
        //     $query .= $key . " != :" . $key . " && ";
        // }

        // $query = trim($query, characters: " && ");

        //
        $this->order_column = "Name";
        $query .= " order by $this->order_column $this->order_type limit $this->limit offset $this->offset";
        $data = array_merge($data, $data_not);
        // return $query;
        return $this->query($query, $data);
    }

    public function updateProjectsByProjectNumber($id, $data)
    {
        return $this->update($id, $data, $id_column = "Id");
    }

    public function deleteProjectsByProjectNumber($id)
    {
        //return $query;
        return $this->delete($id, $id_column = "Id");
    }

}