<?php
class AccessLog {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    
    public function logAccess($userId) {
        $loginTime = date('Y-m-d H:i:s'); 

        $stmt = $this->conn->prepare("INSERT INTO access_logs (user_id, login_time) VALUES (:user_id, :login_time)");
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':login_time', $loginTime);

        if (!$stmt->execute()) {
            error_log("Error logging access: " . implode(", ", $stmt->errorInfo()));
            echo "Error logging access: " . implode(", ", $stmt->errorInfo());
        } 
    }
}
?>

