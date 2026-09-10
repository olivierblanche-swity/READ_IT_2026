<?php

     /**
      * 4  route des tags
      * PATTERN: tags=index
      * CTRL:TagsController
      * ACTION: indexAction
      * 
      */
     if (isset($_GET['tags'])):
          include_once '../app/routers/tags.php';
     /** 3  route des categories
      * PATTERN: catagories=index
      * CTRL:CategoriesController
      * ACTION: indexAction
      * 
      */
     elseif (isset($_GET['categories'])):
          include_once '../app/routers/categories.php';
     /**
      * 2  route des users
      * PATTERN: /
      * CTRL:UsersController
      * ACTION: logoutAction
      * 
      */
     elseif (isset($_GET['users'])):
          include_once '../app/routers/users.php';
     /**
      * 1  route par defaut
      * PATTERN: /
      * CTRL:UsersController
      * ACTION: dashboard
      * 
      */
     else:

     include_once '../app/controllers/usersController.php';
          \App\Controllers\UsersController\dashboardAction($conn);
     
     endif;
