<?php
require_once __DIR__ . '/config/database.php';

$c = $_GET['c'] ?? 'lecturer';
$a = $_GET['a'] ?? 'index';

$map = [
    'lecturer' => 'LecturerController',
    'department' => 'DepartmentController',
    'course' => 'CourseController',
];

if (!isset($map[$c])) {
    die("Controller not found");
}

require_once __DIR__ . '/controllers/' . $map[$c] . '.php';
$ctrl = new $map[$c]();
if (!method_exists($ctrl, $a)) {
    die("Action not found");
}
$ctrl->$a();
