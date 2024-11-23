<?php

class Logout
{
	use Controller;

	public function index()
	{
        $usr = new Account();
        
        if ($usr->clear_session()) {
            echo "Cleared session!";
        } else {
            echo "Failed to clear session.";
        }
    }
}