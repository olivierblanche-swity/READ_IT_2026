<?php

/**
 * ../app/controller/postsController.php
 */

namespace App\Controllers\PostsController;

use \PDO;
use \App\Models\PostsModel;

function indexAction(PDO $conn)
{
    include_once '../app/models/postsModel.php';
    $posts = PostsModel\findAll($conn);

    global $title, $content;
    $title = "posts";
    ob_start();
    include '../app/views/posts/index.php';
    $content = ob_get_clean();
}

function deleteAction(PDO $conn, int $id)
{
    include_once '../app/models/postsModel.php';
    PostsModel\delete($conn, $id);
    header('Location: ' . BACKOFFICE_BASE_URL . 'posts', true, 303);
    exit;
}

function addFormAction(PDO $conn)
{
    include_once '../app/models/authorsModel.php';
    include_once '../app/models/categoriesModel.php';
    include_once '../app/models/tagsModel.php';
    $authors = \App\Models\AuthorsModel\findAll($conn);
    $categories = \App\Models\CategoriesModel\findAll($conn);
    $tags = \App\Models\TagsModel\findAll($conn);
    global $title, $content;
    $title = 'Ajouter un post';
    ob_start();
    include '../app/views/posts/addForm.php';
    $content = ob_get_clean();
}


function insertAction(PDO $conn, array $data)
{
    include_once '../app/models/postsModel.php';
    PostsModel\insert($conn, $data);
    header('Location: ' . BACKOFFICE_BASE_URL . 'posts');
    exit;
}

function editFormAction(PDO $conn, int $id)
{
    include_once '../app/models/postsModel.php';
    $post = PostsModel\findOneById($conn, (string) $id);
    include_once '../app/models/authorsModel.php';
    include_once '../app/models/categoriesModel.php';
    include_once '../app/models/tagsModel.php';
    $authors = \App\Models\AuthorsModel\findAll($conn);
    $categories = \App\Models\CategoriesModel\findAll($conn);
    $tags = \App\Models\TagsModel\findAll($conn);
    global $title, $content;
    $title = 'Modifier un post';
    ob_start();
    include '../app/views/posts/editForm.php';
    $content = ob_get_clean();
}


function updateAction(PDO $conn, int $id, array $data)
{
    include_once '../app/models/postsModel.php';
    PostsModel\update($conn, $id, $data);
    header('Location: ' . BACKOFFICE_BASE_URL . 'posts');
    exit;
}
