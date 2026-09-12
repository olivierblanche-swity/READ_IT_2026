<?php


use \App\Controllers\CategoriesController;


include_once '../app/controllers/categoriesController.php';

$categoryAction = $_GET['categories'] ?? null;
$id = $_GET['id'] ?? $_POST['id'] ?? null;

switch ($categoryAction):

    case 'addForm':
        CategoriesController\addFormAction();
        break;

    case 'insert':
        CategoriesController\insertAction($conn, $_POST);
        break;

    case 'delete':
        if ($id === null) {
            break;
        }
        CategoriesController\deleteAction($conn, (int) $id);
        break;

    case 'editForm':
        if ($id === null) {
            break;
        }
        CategoriesController\editFormAction($conn, (int) $id);
        break;

    case 'update':
        if ($id === null) {
            break;
        }
        CategoriesController\updateAction($conn, [
                                    'id' => (int) $id,
                                    'name' => $_POST['name'] ?? ''
                                    ]);
        break;

    default:

        CategoriesController\indexAction($conn);
        break;
        
endswitch;
