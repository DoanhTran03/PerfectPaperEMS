<?php

/**
 * home class
 */
class Home
{
	use Controller;

	public function index()
	{
		$mEmployee = new Employee();
		$resutl = $mEmployee->findAll();
		print_r($resutl);
		//$this->view('home');
	}

}
