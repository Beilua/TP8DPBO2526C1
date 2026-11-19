<?php
// load lecturer and department models
require_once __DIR__ . '/../models/Lecturer.php';
require_once __DIR__ . '/../models/Department.php';

// controller for lecturer pages
class LecturerController {
    // model dependencies
    private $model;
    private $dept;
    // instantiate models
    public function __construct() {
        $this->model = new Lecturer();
        $this->dept = new Department();
    }

    // show all lecturers
    public function index() {
        $lecturers = $this->model->all();
        require __DIR__ . '/../views/lecturers/index.php';
    }

    // create lecturer form and handler
    public function create() {
        // load department options
        $departments = $this->dept->all();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // normalize department value
            $_POST['department_id'] = ($_POST['department_id'] ?? '') === '' ? null : (int)$_POST['department_id'];
            // save lecturer and redirect
            $this->model->create($_POST);
            header("Location: index.php?c=lecturer&a=index");
            exit;
        }
        require __DIR__ . '/../views/lecturers/create.php';
    }

    // edit lecturer form and handler
    public function edit() {
        $id = $_GET['id'] ?? null;
        // load department options
        $departments = $this->dept->all();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // normalize department value
            $_POST['department_id'] = ($_POST['department_id'] ?? '') === '' ? null : (int)$_POST['department_id'];
            // update lecturer and redirect
            $this->model->update($_POST['id'], $_POST);
            header("Location: index.php?c=lecturer&a=index");
            exit;
        }
        $lecturer = $this->model->find($id);
        require __DIR__ . '/../views/lecturers/edit.php';
    }

    // delete lecturer and redirect
    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) $this->model->delete($id);
        header("Location: index.php?c=lecturer&a=index");
        exit;
    }
}
