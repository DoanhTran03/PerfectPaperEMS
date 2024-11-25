<?php

class Dependents
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

    public function deps_from_token()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                $usr = new Account();

                if (!$usr->is_logged_in()) {
                    echo json_encode("User is not logged in.");
                    exit;
                }

                $dep = new Dependent();
                $dep_data = $dep->from_token();

                if ($dep_data != false) {
                    echo json_encode($dep_data);
                } else {
                    echo json_encode("Could not load dependent data.");
                }
            }
        } catch (Exception $e) {
            echo json_encode($e->getMessage());
            return $e->getMessage();
        }

        exit;
    }
}