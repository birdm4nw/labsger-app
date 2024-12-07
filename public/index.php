<?php
session_start(); 

require_once '../config/Connection.php';
require_once '../app/controllers/AuthController.php';
require_once '../app/controllers/MachineController.php';

$authController = new AuthController();
$machineController = new MachineController();

$action = isset($_GET['action']) ? $_GET['action'] : 'login';
switch ($action) {
    case 'register':
        $authController->register();
        break;
    case 'login':
        $authController->login();
        break;
    case 'logout':
        $authController->logout();
        break;
    // Machine - Actions
    case 'machines':
        $machineController->index();
        break;
    case 'createMachine':
        $machineController->create();
        break;
    case 'updateMachine':
        $machineController->update();
        break;
    case 'deleteMachine':
        $machineController->delete();
        break;
    default:
        require_once '../app/views/notFound.php';
        break;
}
?>