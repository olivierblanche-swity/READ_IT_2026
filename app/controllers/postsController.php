<?php

/**
 * ../app/controller/postsController.php
 */

namespace App\Controllers\PostsController;

use \PDO;
use \App\Models\PostsModel;

function indexAction(PDO $conn) {
    include_once '../app/models/postsModel.php';
    $posts = PostsModel\findAll($conn);

    GLOBAL $title,$content;
    $title = "posts";
    ob_start();
    include '../app/views/templates/posts/index.php';
    $content = ob_get_clean();
}

function showAction(PDO $conn, string $id) {
    include_once '../app/models/postsModel.php';
    $post = PostsModel\findOneById($conn, $id);

    GLOBAL $title,$content;
    $title = "posts";
    ob_start();
    include '../app/views/templates/posts/show.php';
    $content = ob_get_clean();
}
