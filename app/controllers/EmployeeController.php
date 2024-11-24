<?php

/**
 * home class
 */
class EmployeeController
{
    use Controller;
    /**
     * getEmployeeBySS takes in social security number and return a matched employee
     * @return json object of employee that has match the social security number
     */
    public function getEmployeeBySS()
    {
        $SSNumber = $_GET["ss_input"];

        $mEmployee = new Employee();

        $result = $mEmployee->getEmployeeBySSN($SSNumber);

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            echo json_encode($result);
        }

        exit;
    }

}
