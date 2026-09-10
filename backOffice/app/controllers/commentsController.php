<?php


namespace App\Controllers\CommentsController;

use \PDO;
use \App\Models\CommentsModel;
use \App\Models\PostsModel;


function indexAction(PDO $conn, int $postId)
{
    include_once '../app/models/postsModel.php';
    include_once '../app/models/commentsModel.php';
    $post = PostsModel\findOneById($conn, (string) $postId);
    $comments = CommentsModel\findAllByPostId($conn, (string) $postId);
    global $title, $content;
    $title = 'Commentaires du post : ' . $post['title'];
    ob_start();
    include '../app/views/comments/index.php';
    $content = ob_get_clean();
}

function deleteAction(PDO $conn, int $postId, int $commentId)
{
    include_once '../app/models/commentsModel.php';
    CommentsModel\delete($conn, $postId, $commentId);
    header('Location: ' . BACKOFFICE_BASE_URL . 'posts/' . $postId . '/comments');
    exit;
}
