<?php
// load database config
require_once __DIR__ . '/config/database.php';

// read controller and action from query string
$c = $_GET['c'] ?? 'lecturer';
$a = $_GET['a'] ?? 'index';

// map controllers to class names
$map = [
    'lecturer' => 'LecturerController',
    'department' => 'DepartmentController',
    'course' => 'CourseController',
];

// validate controller name
if (!isset($map[$c])) {
    die("Controller not found");
}

// run selected controller action
require_once __DIR__ . '/controllers/' . $map[$c] . '.php';
$ctrl = new $map[$c]();
if (!method_exists($ctrl, $a)) {
    die("Action not found");
}
$ctrl->$a();
