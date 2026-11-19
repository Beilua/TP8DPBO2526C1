<?php
require_once __DIR__ . '/../config/database.php';

class Department {
    private $conn;
    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function all() {
        $res = $this->conn->query("SELECT * FROM departments ORDER BY id DESC");
        return $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function find($id) {
        $stmt = $this->conn->prepare("SELECT * FROM departments WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        return $row;
    }

    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO departments (name, code) VALUES (?,?)");
        $stmt->bind_param("ss", $data['name'], $data['code']);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }

    public function update($id, $data) {
        $stmt = $this->conn->prepare("UPDATE departments SET name=?, code=? WHERE id=?");
        $stmt->bind_param("ssi", $data['name'], $data['code'], $id);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM departments WHERE id = ?");
        $stmt->bind_param("i", $id);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }
}
