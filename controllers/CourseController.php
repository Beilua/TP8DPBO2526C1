<?php
// load course and related models
require_once __DIR__ . '/../models/Course.php';
require_once __DIR__ . '/../models/Lecturer.php';
require_once __DIR__ . '/../models/Department.php';

// controller for course pages
class CourseController {
    // model dependencies
    private $model;
    private $lecturer;
    private $dept;
    // instantiate models
    public function __construct() {
        $this->model = new Course();
        $this->lecturer = new Lecturer();
        $this->dept = new Department();
    }

    // show all courses
    public function index() {
        $courses = $this->model->all();
        require __DIR__ . '/../views/courses/index.php';
    }

    // create course form and handler
    public function create() {
        // load lecturer and department options
        $lecturers = $this->lecturer->all();
        $departments = $this->dept->all();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // normalize posted values
            $_POST['credits'] = (int)($_POST['credits'] ?? 0);
            $_POST['lecturer_id'] = ($_POST['lecturer_id'] ?? '') === '' ? null : (int)$_POST['lecturer_id'];
            $_POST['department_id'] = ($_POST['department_id'] ?? '') === '' ? null : (int)$_POST['department_id'];
            // save course and redirect
            $this->model->create($_POST);
            header("Location: index.php?c=course&a=index");
            exit;
        }
        require __DIR__ . '/../views/courses/create.php';
    }

    // edit course form and handler
    public function edit() {
        $id = $_GET['id'] ?? null;
        // load lecturer and department options
        $lecturers = $this->lecturer->all();
        $departments = $this->dept->all();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // normalize posted values
            $_POST['credits'] = (int)($_POST['credits'] ?? 0);
            $_POST['lecturer_id'] = ($_POST['lecturer_id'] ?? '') === '' ? null : (int)$_POST['lecturer_id'];
            $_POST['department_id'] = ($_POST['department_id'] ?? '') === '' ? null : (int)$_POST['department_id'];
            // update course and redirect
            $this->model->update($_POST['id'], $_POST);
            header("Location: index.php?c=course&a=index");
            exit;
        }
        $course = $this->model->find($id);
        require __DIR__ . '/../views/courses/edit.php';
    }

    // delete course and redirect
    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) $this->model->delete($id);
        header("Location: index.php?c=course&a=index");
        exit;
    }
}
