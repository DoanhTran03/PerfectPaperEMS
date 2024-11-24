<?php

/**
 * home class
 */
class Home
{
	use Controller;

	public function index()
	{
		$this->render("home");
	}

	public function getPage1()
	{
		$this->render("page1");
	}

	public function getPage2()
	{
		$this->render("page2");
	}
	public function getPage3()
	{
		$this->render("page3");
	}

	public function getPage4()
	{
		$this->render("page4");
	}


	public function getEmployees()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			echo $_GET;
			echo json_encode($_GET);
		}

		exit;
		// $data = array(
		// 	"name" => "Doanh",
		// 	"age" => 40
		// );
	}

}
