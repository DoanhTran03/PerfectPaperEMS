<?php 

session_start();

require "../app/core/init.php";

DEBUG ? ini_set('display_errors', value: 1) : ini_set('display_errors', 0);

$app = new App;
$app->loadController();
