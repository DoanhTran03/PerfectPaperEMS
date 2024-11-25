<?php

class Admin
{
    use Controller;

    public function index()
    {
        $usr = new Account();
        $emp = new Employee();

        //Check if the user is logged in.
        if ($usr->is_logged_in() && $emp->is_admin()) {
            $this->view(get_class($this));
        } else {
            header("Location: ./");
        }
    }

    public function get_employees()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $emp = new Employee();

                if (!$emp->is_admin()) {
                    echo json_encode("Not authorized to access this page.");
                    exit;
                }

                $emps_data = $emp->get_all();

                if ($emps_data != false) {
                    echo json_encode($emps_data);
                } else {
                    echo json_encode("Could not load employee data.");
                }
            }
        } catch (Exception $e) {
            echo json_encode($e->getMessage());
            return $e->getMessage();
        }

        exit;
    }

    public function create_employee()
    {
        exit;
    }

    public function delete_employee()
    {
        exit;
    }
    
    public function update_employee()
    {
        exit;
    }
}