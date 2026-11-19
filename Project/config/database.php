<?php
// database singleton class
class Database {
    // shared instance and connection
    private static $instance = null;
    private $conn;

    // open database connection
    private function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db_name = "db_tp8";
        $this->conn = new mysqli($servername, $username, $password, $db_name);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        $this->conn->set_charset("utf8mb4");
    }

    // return shared database instance
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // return mysqli connection
    public function getConnection() {
        return $this->conn;
    }
}
