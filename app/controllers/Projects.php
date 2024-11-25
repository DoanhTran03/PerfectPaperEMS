<?php

class Projects
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

    public function getProjectsByEmployeeID()
    {
        $user = new Account();
        $data = array(
            "Id" => $user->user_from_token()->Id,
        );

        $mProject = new Project();
        // echo json_encode(($data));
        try {
            $result = $mProject->getProjectsByEmployeeID($data);

            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                echo json_encode(value: $result);
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }

        exit;
    }

    public function updateProjectsByProjectNumber()
    {
        $Pnum = $_POST["p_num"];

        $data = array(
            "Budget" => $_POST["Budget"],
            "Name" => $_POST["Pname"],
            "Location" => $_POST["Plocation"],
        );

        $mProject = new Project();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $mProject->updateProjectsByProjectNumber($Pnum, $data);
            echo json_encode(value: $result);
        }

        exit;
    }

    public function deleteProjectsByProjectNumber()
    {
        $Pnum = $_POST["p_num"];

        $mProject = new Project();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $mProject->deleteProjectsByProjectNumber($Pnum);
            echo json_encode(value: $result);
        }

        exit;
    }
}