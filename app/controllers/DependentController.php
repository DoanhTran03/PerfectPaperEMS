<?php

/**
 * home class
 */
class DependentController
{
    use Controller;
    /**
     * getEmployeeBySS takes in social security number and return a matched employee
     * @return json object of employee that has match the social security number
     */
    public function getDependentsByEmployeeSSN()
    {
        $SSNumber = $_GET["ss_num"];

        $data = array(
            "Ssn" => $SSNumber,
        );

        $mDependent = new Dependent();

        $result = $mDependent->getDependentsByEmployeeSSN($data);

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            echo json_encode($result);
        }

        exit;
    }

}
