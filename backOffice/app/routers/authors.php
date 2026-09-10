<?php

use App\Controllers\AuthorsController;

include_once '../app/controllers/authorsController.php';

$authorsAction = $_GET['authors'] ?? null;
$id = $_GET['id'] ?? $_POST['id'] ?? null;

switch ($authorsAction):

    case 'addForm':
        AuthorsController\addFormAction();
        break;

    case 'insert':
        AuthorsController\insertAction($conn, $_POST);
        break;

    case 'delete':
        if ($id === null) {
            break;
        }
        AuthorsController\deleteAction($conn, (int) $id);
        break;

    case 'editForm':
        if ($id === null) {
            break;
        }
        AuthorsController\editFormAction($conn, (int) $id);
        break;

    case 'update':
        if ($id === null) {
            break;
        }
        AuthorsController\updateAction($conn, [
            'id' => (int) $id,
            'lastname' => $_POST['lastname'] ?? '',
            'firstname' => $_POST['firstname'] ?? '',
            'biography' => $_POST['biography'] ?? '',
            'image' => $_POST['image'] ?? ''
        ]);
        break;

    default:

        AuthorsController\indexAction($conn);

endswitch;
