<?php
require_once __DIR__ . '/../models/Lecturer.php';
require_once __DIR__ . '/../models/Department.php';

class LecturerController {
    private $model;
    private $dept;
    public function __construct() {
        $this->model = new Lecturer();
        $this->dept = new Department();
    }

    public function index() {
        $lecturers = $this->model->all();
        require __DIR__ . '/../views/lecturers/index.php';
    }

    public function create() {
        $departments = $this->dept->all();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST['department_id'] = ($_POST['department_id'] ?? '') === '' ? null : (int)$_POST['department_id'];
            $this->model->create($_POST);
            header("Location: index.php?c=lecturer&a=index");
            exit;
        }
        require __DIR__ . '/../views/lecturers/create.php';
    }

    public function edit() {
        $id = $_GET['id'] ?? null;
        $departments = $this->dept->all();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST['department_id'] = ($_POST['department_id'] ?? '') === '' ? null : (int)$_POST['department_id'];
            $this->model->update($_POST['id'], $_POST);
            header("Location: index.php?c=lecturer&a=index");
            exit;
        }
        $lecturer = $this->model->find($id);
        require __DIR__ . '/../views/lecturers/edit.php';
    }

    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) $this->model->delete($id);
        header("Location: index.php?c=lecturer&a=index");
        exit;
    }
}
