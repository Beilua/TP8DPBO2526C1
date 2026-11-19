<?php
require_once __DIR__ . '/../config/database.php';

// lecturer data access class
class Lecturer {
    // database connection
    private $conn;
    // get shared connection
    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }

    // fetch all lecturers with department names
    public function all() {
        $res = $this->conn->query("SELECT l.*, d.name AS department_name FROM lecturers l LEFT JOIN departments d ON l.department_id = d.id ORDER BY l.id DESC");
        return $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
    }

    // find one lecturer by id
    public function find($id) {
        $stmt = $this->conn->prepare("SELECT * FROM lecturers WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        return $row;
    }

    // insert new lecturer
    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO lecturers (name, nidn, phone, join_date, department_id) VALUES (?,?,?,?,?)");
        $stmt->bind_param("ssssi", $data['name'], $data['nidn'], $data['phone'], $data['join_date'], $data['department_id']);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }

    // update existing lecturer
    public function update($id, $data) {
        $stmt = $this->conn->prepare("UPDATE lecturers SET name=?, nidn=?, phone=?, join_date=?, department_id=? WHERE id=?");
        $stmt->bind_param("ssssii", $data['name'], $data['nidn'], $data['phone'], $data['join_date'], $data['department_id'], $id);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }

    // delete lecturer by id
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM lecturers WHERE id = ?");
        $stmt->bind_param("i", $id);
        $ok = $stmt->execute();
        $stmt->close();
        return $ok;
    }
}
