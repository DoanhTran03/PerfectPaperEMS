<?php

class Home
{
	use Controller;

	public function index()
	{
        $usr = new Account();
        // Check if the user is logged in.
		if ($usr->is_logged_in()) {
            $this->view(get_class($this));
        } else {
            header("Location: ./login");
        }
    }
}