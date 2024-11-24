<?php

/**
 * home class
 */

class ProjectController
{
    use Controller;
    /**
     * getEmployeeBySS takes in social security number and return a matched employee
     * @return json object of employee that has match the social security number
     */
    public function getProjectsByEmployeeSSN()
    {
        $SSNumber = $_GET["ss_num"];

        $data = array(
            "Ssn" => $SSNumber,
        );

        $mProject = new Project();

        $result = $mProject->getProjectsByEmployeeSSN($data);

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            echo json_encode(value: $result);
        }

        exit;
    }

    public function updateProjectsByProjectNumber()
    {
        $Pnum = $_POST["p_num"];

        $data = array(
            "Budget" => $_POST["Budget"],
            "Pname" => $_POST["Pname"],
            "Plocation" => $_POST["Plocation"],
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
