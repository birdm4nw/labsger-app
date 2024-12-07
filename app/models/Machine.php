<?php

class Machine {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Get machine data
    public function getAllByUserId($userId) {
        $stmt = $this->conn->prepare("SELECT * FROM machines WHERE user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Add machine
    public function create($userId, $name, $operating_system, $difficulty, $platform, $techniques, $status) {
        $stmt = $this->conn->prepare("INSERT INTO machines (user_id, name, operating_system, difficulty, platform, techniques, status) VALUES (:user_id, :name, :operating_system, :difficulty, :platform, :techniques, :status)");

        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':operating_system', $operating_system);
        $stmt->bindParam(':difficulty', $difficulty);
        $stmt->bindParam(':platform', $platform);
        $stmt->bindParam(':techniques', $techniques);
        $stmt->bindParam(':status', $status);
        return $stmt->execute();
    }

    // Update - Machine 
    public function update($id, $userId, $name, $operating_system, $difficulty, $platform, $techniques, $status) {
        $stmt = $this->conn->prepare("UPDATE machines SET name = ?, operating_system = ?, difficulty = ?, platform = ?, techniques = ?, status = ? WHERE id = ? AND user_id = ?");
        return $stmt->execute([$name, $operating_system, $difficulty, $platform, $techniques, $status, $id, $userId]);
    }

    // Remove - Machine
    public function delete($id, $userId) {
        $stmt = $this->conn->prepare("DELETE FROM machines WHERE id = ? AND user_id = ?");
        return $stmt->execute([$id, $userId]);
    }
}

?>