<?php
require_once '../config/Connection.php'; 
require_once '../app/models/User.php';    
require_once '../app/models/AccessLog.php';  

class AuthController {
    private $user;
    private $accessLog; 

    public function __construct() {
        $connection = new Connection();
        $db = $connection->getConnection();
        $this->user = new User($db);
        $this->accessLog = new AccessLog($db);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            
            if ($password !== $confirm_password) {
                $error_message = "Passwords do not match!";
                include '../app/views/register.php';
                return;
            }

            if ($this->user->usernameExists($username)) {
                $error_message_u = "Username already exists! Please choose a different username.";
                include '../app/views/register.php';
                return;
            }

            if ($this->user->register($username, $email, $password)) {
                $_SESSION['success_message'] = "Registration successful!";
                
                header("Location: ?action=register");
                exit(); 
            } else {
                $_SESSION['error_message'] = "Registration failed!";
            }
        }
        include '../app/views/register.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $this->user->login($username, $password);
            
            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $this->accessLog->logAccess($user['id']); 
                header('Location: /labsger-app/app/views/machines.php');
                exit();
            } else {
                $error_login = "Login failed!";
            }
        }
        
        
        include '../app/views/login.php';
    }

    public function logout() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        $_SESSION = [];

        session_destroy();

        header("Location: /app-test/public");
        exit();
    }
}
?>