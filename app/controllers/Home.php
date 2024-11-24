<?php

class Home
{
    use Controller;

    public function index()
    {
        $usr = new Account();
        // try {
        //     $userdata = array(
        //         "Employee_id" => 14,
        //         "Pass_hash" => "pass",
        //         "Last_token" => null,
        //         "Token_experation" => null,
        //         "Active" => 1
        //     );
        //     echo "It reached here";
        //     echo $usr->create_user($userdata);
        // } catch (Exception $e) {
        //     print $e->getMessage();
        // }

        //Check if the user is logged in.
        if ($usr->is_logged_in()) {
            $this->view(get_class($this));
        } else {
            header("Location: ./login");
        }
    }
}