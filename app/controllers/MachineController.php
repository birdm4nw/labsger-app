<?php
require_once '../config/Connection.php';
require_once '../app/models/Machine.php';

class MachineController {
    private $machineModel;

    public function __construct() {
        $connection = new Connection();
        $db = $connection->getConnection();
        $this->machineModel = new Machine($db);
    }

    public function index() {
        $userId = $_SESSION['user_id'];
        $machines = $this->machineModel->getAllByUserId($userId);
        include '../app/views/machines.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = isset($_POST['user_id']) ? $_POST['user_id'] : null;
            if ($userId === null) {
                echo "User ID is required.";
                exit();
            }
            $name = $_POST['name'];
            $operating_system = $_POST['operating_system'];
            $difficulty = $_POST['difficulty'];
            $platform = $_POST['platform'];
            $techniques = $_POST['techniques'];
            $status = $_POST['status'];

            $this->machineModel->create($userId, $name, $operating_system, $difficulty, $platform, $techniques, $status);
            echo "Machine added!";
            header('Location: /labsger-app/app/views/machines.php');
            exit();
            
        }
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $userId = $_SESSION['user_id'];
            $name = $_POST['name'];
            $operating_system = $_POST['operating_system'];
            $difficulty = $_POST['difficulty'];
            $platform = $_POST['platform'];
            $techniques = $_POST['techniques'];
            $status = $_POST['status'];

            $this->machineModel->update($id, $userId, $name, $operating_system, $difficulty, $platform, $techniques, $status);
            header('Location: /labsger-app/app/views/machines.php');
            exit();
        }
    }

    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $userId = $_SESSION['user_id'];
            $this->machineModel->delete($id, $userId);
            header('Location: /labsger-app/public/index.php?action=machines');
        }
    }
}

?>