<?php

if ($_SERVER['SERVER_NAME'] == 'localhost') {
	/** database config **/
	define('DBNAME', 'killen2_4150_lab3');
	define('DBHOST', 'localhost');
	define('DBUSER', 'killen2_4150_lab3');
	define('DBPASS', file_get_contents(dirname(__FILE__) . "/secret.txt"));
	define('DBDRIVER', '');

	define('ROOT', 'http://localhost/mvc/public');

} else {
	/** database config **/
	define('DBNAME', 'killen2_4150_lab3');
	define('DBHOST', 'localhost');
	define('DBUSER', 'killen2_4150_lab3');
	define('DBPASS', file_get_contents(dirname(__FILE__) . "/secret.txt"));
	define('DBDRIVER', '');

	define('ROOT', 'https://killen2.myweb.cs.uwindsor.ca/finalproject');

}

define('APP_NAME', "Perfect Paper EMS");
define('APP_DESC', "Perfect Paper's Employee Management System");

/** true means show errors **/
define('DEBUG', false);
