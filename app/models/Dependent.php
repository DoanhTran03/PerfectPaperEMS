<?php


/**
 * User class
 */
class oDependent
{
    public $Name = '';
    public $Sex = '';

}

class Dependent
{
    use Model;

    protected $table = 'Dependent';

    protected $allowedColumns = [];

    public function getDependentsByEmployeeSSN($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);

        $query = "	SELECT D.Dependent_name, D.Sex, E.Ssn
					FROM 
						Dependent AS D
                    INNER JOIN 
                        Employee_Dependent AS ED
                    ON
                        D.Id = ED.Dependent_id
                    INNER JOIN 
                        Employee AS E
                    ON ED.Employee_id = E.Id WHERE ";

        foreach ($keys as $key) {
            $query .= $key . " = :" . $key . " && ";
        }

        foreach ($keys_not as $key) {
            $query .= $key . " != :" . $key . " && ";
        }

        $query = trim($query, characters: " && ");

        $this->order_column = "Dependent_name";
        $query .= " order by $this->order_column $this->order_type limit $this->limit offset $this->offset";
        $data = array_merge($data, $data_not);

        return $this->query($query, $data);
    }
}