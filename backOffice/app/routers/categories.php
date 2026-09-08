<?php

use App\Controllers\PostsController;

include_once '../app/controllers/postsController.php';

switch ($_GET['categories']):

    case 'show':
        PostsController\categoryAction($conn, $_GET['id']);
        break;

endswitch;
