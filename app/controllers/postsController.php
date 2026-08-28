<?php

/**
 * ../app/controller/postsController.php
 */

namespace App\Controllers\PostsController;

use \PDO;
use \App\Models\PostsModel;
use \App\Models\TagsModel;
use \App\Models\AuthorsModel;
use \App\Models\CommentsModel;

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
    include_once '../app/models/tagsModel.php';
    include_once '../app/models/authorsModel.php';
    include_once '../app/models/commentsModel.php';
    
    $post = PostsModel\findOneById($conn, $id);
    $tags = TagsModel\findAllByPostId($conn,$id);
    $author = AuthorsModel\findAllByPostId($conn,$id);
    $comments = CommentsModel\findAllByPostId($conn,$id);



    GLOBAL $title,$content;
    $title = "posts";
    ob_start();
    include '../app/views/templates/posts/show.php';
    $content = ob_get_clean();
}
