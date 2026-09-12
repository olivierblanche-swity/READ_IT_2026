<?php

use App\Controllers\UsersController;

include_once '../app/controllers/usersController.php';

$userAction = $_GET['users'] ?? null;
$id = $_GET['id'] ?? $_POST['id'] ?? null;

switch ($_GET['users']):

    case 'index':
        UsersController\indexAction($conn);
        break;

    case 'addForm':
        UsersController\addFormAction();
        break;

    case 'insert':
        UsersController\insertAction($conn, $_POST);
        break;

    case 'delete':
        if ($id === null) {
            break;
        }
        UsersController\deleteAction($conn, (int) $id);
        break;

    case 'editForm':
        if ($id === null) {
            break;
        }
        UsersController\editFormAction($conn, (int) $id);
        break;

    case 'update':
        if ($id === null) {
            break;
        }
        UsersController\updateAction($conn, [
                                    'id' => (int) $id,
                                    'login' => $_POST['login'] ?? '',
                                    'pwd' => $_POST['pwd'] ?? '',
                                    'firstname' => $_POST['firstname'] ?? '',
                                    'lastname' => $_POST['lastname'] ?? '',
                                    'status' => $_POST['status'] ?? '',
                                    ]);
        break;

    case 'logout':
        UsersController\logoutAction();
        break;

    default:

        UsersController\indexAction($conn);
        break;

endswitch;