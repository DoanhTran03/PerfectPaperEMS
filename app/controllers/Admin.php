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

    public function delete_employee()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["t_id"])) {
                $emp_id = $_POST["t_id"];

                if (intval($emp_id) == 0) {
                    echo json_encode("Invalid employee id given.");
                    exit;
                }

                $emp = new Employee();
                $emp->delete_from_id($emp_id);
                echo "Success.";
            }
        } catch (Exception $e) {
            echo json_encode($e->getMessage());
            return $e->getMessage();
        }

        exit;
    }
    
    public function update_employee()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["t_id"])) {
                $emp_id = $_POST["t_id"];

                if (intval($emp_id) == 0) {
                    echo json_encode("Invalid employee id given.");
                    exit;
                }

                $post_data = [];
                $post_fields = ["t_fname" => "Fname", "t_lname" => "Lname", "t_bdate" => "Bdate", "t_address" => "Address", "t_salary" => "Salary", "t_admin" => "Is_admin"];

                foreach ($post_fields as $key => $value) {
                    if (isset($_POST[$key])) {
                        $post_data[$value] = $_POST[$key];
                    }
                }

                $emp = new Employee();

                if (!$emp->is_admin()) {
                    echo json_encode("Not authorized to access this page.");
                    exit;
                }

                if ($emp->update_info($emp_id, $post_data) != false) {
                    echo json_encode("Success.");
                } else {
                    echo json_encode("Failed to update info.");
                }
            }
        } catch (Exception $e) {
            echo json_encode($e->getMessage());
            return $e->getMessage();
        }
        exit;
    }
}