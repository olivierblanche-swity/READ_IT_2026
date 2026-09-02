<?php


namespace App\Controllers\CommentsController;

use \PDO;
use \App\Models\CommentsModel;
use \App\Models\PostsModel;
use \Core\Helpers;

function storeAction(PDO $conn)
{
    include_once '../app/models/commentsModel.php';
    include_once '../app/models/postsModel.php';
    include_once '../core/helpers.php';

    CommentsModel\insertOne($conn);

    $postId = (int) $_POST['post_id'];
    $post = PostsModel\findOneById($conn, (string) $postId);
    $basePath = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');
    $postUrl = $basePath . '/posts/' . $postId . '/' . Helpers\slugify($post['title']) . '.html';

    header('Location: ' . $postUrl);
    exit;
}
