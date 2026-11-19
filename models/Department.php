<?php
require_once __DIR__ . '/../config/database.php';

// department data access class
class Department {
    // database connection
    private $conn;
    // get shared connection
    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }

    // fetch all departments
    public function all() {
        $res = $this->conn->query("SELECT * FROM departments ORDER BY id DESC");
        return $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
    }

    // find one department by id
    public function find($id) {
        $stmt = $this->conn->prepare("SELECT * FROM departments WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        return $row;
    }

    // insert new department
    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO departments (name, code) VALUES (?,?)");
        $stmt->bind_param("ss", $data['name'], $data['code']);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }

    // update existing department
    public function update($id, $data) {
        $stmt = $this->conn->prepare("UPDATE departments SET name=?, code=? WHERE id=?");
        $stmt->bind_param("ssi", $data['name'], $data['code'], $id);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }

    // delete department by id
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM departments WHERE id = ?");
        $stmt->bind_param("i", $id);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }
}
