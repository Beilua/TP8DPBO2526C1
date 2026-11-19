<?php
require_once __DIR__ . '/../config/database.php';

class Course {
    private $conn;
    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function all() {
        $sql = "SELECT c.*, l.name AS lecturer_name, d.name AS department_name
                FROM courses c
                LEFT JOIN lecturers l ON c.lecturer_id = l.id
                LEFT JOIN departments d ON c.department_id = d.id
                ORDER BY c.id DESC";
        $res = $this->conn->query($sql);
        return $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function find($id) {
        $stmt = $this->conn->prepare("SELECT * FROM courses WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        return $row;
    }

    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO courses (name, credits, lecturer_id, department_id) VALUES (?,?,?,?)");
        $stmt->bind_param("siii", $data['name'], $data['credits'], $data['lecturer_id'], $data['department_id']);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }

    public function update($id, $data) {
        $stmt = $this->conn->prepare("UPDATE courses SET name=?, credits=?, lecturer_id=?, department_id=? WHERE id=?");
        $stmt->bind_param("siiii", $data['name'], $data['credits'], $data['lecturer_id'], $data['department_id'], $id);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM courses WHERE id = ?");
        $stmt->bind_param("i", $id);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }
}
