<?php
$db_name = file_get_contents(dirname(__FILE__) . "/dbinfo.txt");
$secret = file_get_contents(dirname(__FILE__) . "/secret.txt");

if ($_SERVER['SERVER_NAME'] == 'localhost') {
	/** database config **/
	define('DBNAME', $db_name);
	define('DBHOST', 'localhost');
	define('DBUSER', $db_name);
	define('DBPASS', $secret);
	define('DBDRIVER', '');

	define('ROOT', 'http://localhost/mvc/public');

} else {
	/** database config **/
	define('DBNAME', $db_name);
	define('DBHOST', 'localhost');
	define('DBUSER', $db_name);
	define('DBPASS', $secret);
	define('DBDRIVER', '');

	define('ROOT', 'https://killen2.myweb.cs.uwindsor.ca/');
}

define('APP_NAME', "Perfect Paper EMS");
define('APP_DESC', "Perfect Paper's Employee Management System");

/** true means show errors **/
define('DEBUG', false);
