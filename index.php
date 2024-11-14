<?php
require_once ('class/database.php');
require_once "class/language.php";
require_once "class/user.php";
require_once "class/lesson.php";
require_once "class/vocabulary.php";
require_once('client/controller/BaseController.php');
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'Home';
$action = isset($_GET['action']) ? $_GET['action'] : 'HomeLogout';
$role = isset($_GET['role']) ? $_GET['role'] : 'client'; // Mặc định là client
require_once('route.php');


?>

