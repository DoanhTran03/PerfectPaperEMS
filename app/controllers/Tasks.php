<?php

class Tasks
{
    use Controller;

    public function index()
    {
        $usr = new Account();

        //Check if the user is logged in.
        if ($usr->is_logged_in()) {
            $this->view(get_class($this));
        } else {
            header("Location: ./login");
        }
    }

    public function getTasksByEmployeeID()
    {
        $user = new Account();

        try {
            $data = array(
                "Id" => $user->user_from_token()->Id,
            );

            $mTask = new Task();
            // echo json_encode($data);
            $result = $mTask->getTasksByEmployeeID($data);

            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                echo json_encode(value: $result);
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }

        exit;
    }

    public function updateTaskByTaskId()
    {
        $TaskID = $_POST["t_id"];

        $data = array(
            "Name" => $_POST["t_name"],
            "Description" => $_POST["t_description"],
            "Start_date" => $_POST["t_startdate"],
            "End_date" => $_POST["t_enddate"],
        );

        $mTask = new Task();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $mTask->updateTaskByTaskId($TaskID, $data);
            echo json_encode(value: $result);
        }

        exit;
    }

    public function deleteTaskByTaskId()
    {
        $TaskID = $_POST["t_id"];

        $mTask = new Task();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $mTask->deleteTaskByTaskId($TaskID);
            echo json_encode(value: $result);
        }

        exit;
    }
}