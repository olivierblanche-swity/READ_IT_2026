<?php

/**
 * ../app/controller/postsController.php
 */

namespace App\Controllers\PostsController;

use \PDO;
use \App\Models\PostsModel;
use \App\Models\TagsModel;
use \App\Models\CategoriesModel;
use \App\Models\AuthorsModel;
use \App\Models\CommentsModel;

function indexAction(PDO $conn)
{
    include_once '../app/models/postsModel.php';
    $page = max(1, (int) ($_GET['page'] ?? 1));
    $postsPerPage = 10;
    $totalPosts = PostsModel\countAll($conn);
    $totalPages = max(1, (int) ceil($totalPosts / $postsPerPage));
    $page = min($page, $totalPages);

    $posts = PostsModel\findAll($conn, $page, true, $postsPerPage);
    $hasMorePosts = count($posts) > $postsPerPage;
    $posts = array_slice($posts, 0, $postsPerPage);
    $hasPreviousPage = $page > 1;
    $previousPage = max(1, $page - 1);
    $nextPage = min($totalPages, $page + 1);
    $pageNumbers = [];

    $startPage = max(1, $page - 2);
    $endPage = min($totalPages, $page + 2);

    for ($i = $startPage; $i <= $endPage; $i++) {
        $pageNumbers[] = $i;
    }

    global $title, $content;
    $title = "posts";
    ob_start();
    include '../app/views/posts/index.php';
    $content = ob_get_clean();
}

function tagAction(PDO $conn, string $id)
{
    include_once '../app/models/tagsModel.php';
    $posts = TagsModel\findAllByTagId($conn, $id);

    global $title, $content;
    $title = "tag";
    ob_start();
    include '../app/views/posts/index.php';
    $content = ob_get_clean();
}

function categoryAction(PDO $conn, string $id)
{
    include_once '../app/models/categoriesModel.php';
    $posts = CategoriesModel\findAllByCategoryId($conn, $id);

    global $title, $content;
    $title = "category";
    ob_start();
    include '../app/views/posts/index.php';
    $content = ob_get_clean();
}

function showAction(PDO $conn, string $id)
{
    include_once '../app/models/postsModel.php';
    include_once '../app/models/tagsModel.php';
    include_once '../app/models/authorsModel.php';
    include_once '../app/models/commentsModel.php';

    $post = PostsModel\findOneById($conn, $id);
    $tags = TagsModel\findAllByPostId($conn, $id);
    $author = AuthorsModel\findAllByPostId($conn, $id);
    $comments = CommentsModel\findAllByPostId($conn, $id);



    global $title, $content;
    $title = "posts";
    ob_start();
    include '../app/views/posts/show.php';
    $content = ob_get_clean();
}

function searchAction(PDO $conn, string $query)
{
    include_once '../app/models/postsModel.php';
    $posts = PostsModel\search($conn, $query);

    global $title, $content;
    $title = "search";
    ob_start();
    include '../app/views/posts/index.php';
    $content = ob_get_clean();
}
