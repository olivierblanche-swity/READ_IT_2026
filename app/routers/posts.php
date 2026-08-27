<?php

use App\Controllers\PostsController;

include_once '../app/controllers/postsController.php';

switch ($_GET['posts']):

    case 'show':
        PostsController\showAction($conn,$_GET['id']);
        break;

endswitch;


