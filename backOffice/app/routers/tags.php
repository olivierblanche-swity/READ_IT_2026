<?php

use App\Controllers\TagsController;

include_once '../app/controllers/tagsController.php';

$tagAction = $_GET['tags'] ?? null;
$id = $_GET['id'] ?? $_POST['id'] ?? null;

switch ($tagAction):

    

    case 'addForm':
        TagsController\addFormAction();
        break;

    case 'insert':
        TagsController\insertAction($conn, $_POST);
        break;

    case 'delete':
        if ($id === null) {
            break;
        }
        TagsController\deleteAction($conn, (int) $id);
        break;

    case 'editForm':
        if ($id === null) {
            break;
        }
        TagsController\editFormAction($conn, (int) $id);
        break;

    case 'update':
        if ($id === null) {
            break;
        }
        TagsController\updateAction($conn, [
                                    'id' => (int) $id,
                                    'name' => $_POST['name'] ?? ''
                                    ]);
        break;
        
    default:
    
        TagsController\indexAction($conn);
        
endswitch;
