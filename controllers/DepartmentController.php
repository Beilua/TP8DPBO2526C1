<?php
require_once __DIR__ . '/../models/Department.php';

class DepartmentController {
    private $model;
    public function __construct() {
        $this->model = new Department();
    }

    public function index() {
        $departments = $this->model->all();
        require __DIR__ . '/../views/departments/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->create($_POST);
            header("Location: index.php?c=department&a=index");
            exit;
        }
        require __DIR__ . '/../views/departments/create.php';
    }

    public function edit() {
        $id = $_GET['id'] ?? null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->update($_POST['id'], $_POST);
            header("Location: index.php?c=department&a=index");
            exit;
        }
        $department = $this->model->find($id);
        require __DIR__ . '/../views/departments/edit.php';
    }

    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) $this->model->delete($id);
        header("Location: index.php?c=department&a=index");
        exit;
    }
}
