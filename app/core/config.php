<?php

if ($_SERVER['SERVER_NAME'] == 'localhost') {
	/** database config **/
	define('DBNAME', 'tran97_comp4150db');
	define('DBHOST', 'localhost');
	define('DBUSER', 'tran97_comp4150db');
	define('DBPASS', file_get_contents(dirname(__FILE__) . "/secret.txt"));
	define('DBDRIVER', '');

	define('ROOT', 'https://tran97.myweb.cs.uwindsor.ca/integrate/public');

} else {
	/** database config **/
	define('DBNAME', 'tran97_comp4150db');
	define('DBHOST', 'localhost');
	define('DBUSER', 'tran97_comp4150db');
	define('DBPASS', file_get_contents(dirname(__FILE__) . "/secret.txt"));
	define('DBDRIVER', '');

	define('ROOT', 'https://tran97.myweb.cs.uwindsor.ca/integrate/public');

}

define('APP_NAME', "Perfect Paper EMS");
define('APP_DESC', "Perfect Paper's Employee Management System");

/** true means show errors **/
define('DEBUG', false);
