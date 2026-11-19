<?php
// load department model
require_once __DIR__ . '/../models/Department.php';

// controller for department pages
class DepartmentController {
    // model dependency
    private $model;
    // instantiate model
    public function __construct() {
        $this->model = new Department();
    }

    // show all departments
    public function index() {
        $departments = $this->model->all();
        require __DIR__ . '/../views/departments/index.php';
    }

    // create department form and handler
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // save department and redirect
            $this->model->create($_POST);
            header("Location: index.php?c=department&a=index");
            exit;
        }
        require __DIR__ . '/../views/departments/create.php';
    }

    // edit department form and handler
    public function edit() {
        $id = $_GET['id'] ?? null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // update department and redirect
            $this->model->update($_POST['id'], $_POST);
            header("Location: index.php?c=department&a=index");
            exit;
        }
        $department = $this->model->find($id);
        require __DIR__ . '/../views/departments/edit.php';
    }

    // delete department and redirect
    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) $this->model->delete($id);
        header("Location: index.php?c=department&a=index");
        exit;
    }
}
