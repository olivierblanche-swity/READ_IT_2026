<?php

use App\Controllers\PostsController;
use App\Controllers\CommentsController;

include_once '../app/controllers/postsController.php';
include_once '../app/controllers/commentsController.php';

$action = $_GET['posts'];
$id = (int) ($_GET['id'] ?? 0);

// Les actions qui modifient les données utilisent POST.
if (in_array($action, ['insert', 'update', 'delete', 'deleteComment'])
    && $_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Allow: POST');
    http_response_code(405);
    exit;
}

switch ($action):
    
    case 'addForm':
        PostsController\addFormAction($conn);
        break;
    case 'insert':
        PostsController\insertAction($conn, $_POST);
        break;
    case 'editForm':
        PostsController\editFormAction($conn, $id);
        break;
    case 'update':
        PostsController\updateAction($conn, $id, $_POST);
        break;
    case 'delete':
        PostsController\deleteAction($conn, $id);
        break;
    case 'comments':
        CommentsController\indexAction($conn, $id);
        break;
    case 'deleteComment':
        CommentsController\deleteAction($conn, $id, (int) $_GET['comment_id']);
        break;
    default:
        
        PostsController\indexAction($conn);
        
endswitch;
