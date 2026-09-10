<?php

     /**
      * 6  route des posts
      */
     if (isset($_GET['posts'])):
          include_once '../app/routers/posts.php';
     /**
      * 5  route des authors
      */

     elseif (isset($_GET['authors'])):
          include_once '../app/routers/authors.php';
     /** 
      * 4  route des tags
      */
     elseif (isset($_GET['tags'])):
          include_once '../app/routers/tags.php';
     /** 
      * 3  route des categories 
      */
     elseif (isset($_GET['categories'])):
          include_once '../app/routers/categories.php';
     /**
      * 2  route des users
      */
     elseif (isset($_GET['users'])):
          include_once '../app/routers/users.php';

     else:
     /**
      * 1  route par defaut
      * PATTERN: /
      * CTRL:UsersController
      * ACTION: dashboard
      * 
      */
     include_once '../app/controllers/usersController.php';
          \App\Controllers\UsersController\dashboardAction($conn);
     
     endif;
