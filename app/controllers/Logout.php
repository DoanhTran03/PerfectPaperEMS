<?php

class Logout
{
	use Controller;

	public function index()
	{
        $usr = new Account();
        
        if (!$usr->log_out()) {
            print("Could not clear session!");
        }

        header("Location: ./");
    }
}