<?php

/**
     * 1  route par defaut
     * PATTERN: /
     * CTRL:postsController
     * ACTION: index
     * 
     */

    include_once '../app/controllers/postsController.php';
    \App\Controllers\PostsController\indexAction($conn);



