<?php

use App\Controllers\PostsController;

include_once '../app/controllers/postsController.php';

switch ($_GET['tags']):

    case 'show':
        PostsController\tagAction($conn, $_GET['id']);
        break;

endswitch;
