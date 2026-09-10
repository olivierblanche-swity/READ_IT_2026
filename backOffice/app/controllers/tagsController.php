<?php

namespace App\Controllers\TagsController;

use \App\Models\TagsModel;
use \PDO;

function indexAction(PDO $conn)
{

    include_once '../app/models/tagsModel.php';

    $tags = TagsModel\findAll($conn);

    global $title, $content;

    $title = 'Tags';
    ob_start();
    include '../app/views/tags/index.php';
    $content = ob_get_clean();
}

function addFormAction()
{

    global $title, $content;

    $title = 'Tags- Formulaire';
    ob_start();
    include '../app/views/tags/addForm.php';
    $content = ob_get_clean();
}

function insertAction(PDO $conn, array $data)
{
    include_once '../app/models/tagsModel.php';
    $id = tagsModel\insert($conn, $data);

    header('location: ' . BACKOFFICE_BASE_URL . 'tags');
}

function deleteAction(PDO $conn, int $id)
{
    include_once '../app/models/tagsModel.php';
    $return = TagsModel\delete($conn, $id);

    header('location: ' . BACKOFFICE_BASE_URL . 'tags');
}

function editFormAction(PDO $conn, int $id)
{
    include_once '../app/models/tagsModel.php';
    $tag = TagsModel\findOneById($conn, $id);


    global $title, $content;

    $title = 'Tags- Modification';
    ob_start();
    include '../app/views/tags/editForm.php';
    $content = ob_get_clean();
}

function updateAction(PDO $conn,  array $data)
{
    include_once '../app/models/tagsModel.php';
    $return = TagsModel\update($conn, $data);

    header('location: ' . BACKOFFICE_BASE_URL . 'tags');
}
