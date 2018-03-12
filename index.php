<?php

require_once 'vendor/autoload.php';

require_once 'app/controllers/Controller.php';
require_once 'app/components/Session.php';
require_once 'app/components/Navbar.php';

define('PROJECT_NAME', 'SkillUP');

Session::start();

$query = $_GET;
$method = null;
$action = null;
if (isset($query['act'])) {
    $action = $query['act'];
    $method = $action.'Action';
}

$controller = new Controller();
if ($method && method_exists($controller, $method)) {
    Navbar::$active = $action;
    // Метод точно есть
    $controller->{$method}();
} else {
    $controller->homeAction();
}
