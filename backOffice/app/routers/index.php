<?php

if (isset($_GET['comments']) and $_GET['comments'] == 'add'):
     include_once '../app/controllers/commentsController.php';
     \App\Controllers\CommentsController\storeAction($conn);

elseif (isset($_GET['contact'])):
     include_once '../app/routers/contact.php';


elseif (isset($_GET['tags'])):
     include_once '../app/routers/tags.php';

elseif (isset($_GET['categories'])):
     include_once '../app/routers/categories.php';

elseif (isset($_GET['posts'])):
     include_once '../app/routers/posts.php';

else:
     /**
      * 1  route par defaut
      * PATTERN: /
      * CTRL:postsController
      * ACTION: index
      * 
      */

     include_once '../app/controllers/postsController.php';
     \App\Controllers\PostsController\indexAction($conn);

endif;
