<?php


/**
 * User class
 */


class Task
{
    use Model;

    protected $table = 'Task';

    protected $allowedColumns = [];

    public function getTasksByEmployeeID($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);

        $query = "SELECT T.Id AS Task_id, S.Name AS Status, T.Name, T.Description, T.Start_date, T.End_date
                    FROM 
                        Task AS T
                    INNER JOIN 
                        Employees_On_Task AS O
                    ON
                        T.Id = O.Task_id
                    INNER JOIN 
                        Employee AS E
                    ON O.Employee_id = E.Id
                    INNER JOIN 
                        Task_Status AS S
                    ON T.Status = S.Id
                    
                     WHERE E.Id = :Id";

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

    public function updateTaskByTaskId($id, $data)
    {
        return $this->update($id, $data, $id_column = "Id");
    }

    public function deleteTaskByTaskId($id)
    {
        //return $query;
        return $this->delete($id, $id_column = "Id");
    }

}