<?php 

namespace App\Controllers\AuthorsController;

use \App\Models\AuthorsModel;
use \PDO;

function indexAction(PDO $conn) {

include_once '../app/models/authorsModel.php';

$authors = AuthorsModel\findAll($conn);

GLOBAL $title, $content;

$title = 'Auteurs';
ob_start();
include '../app/views/authors/index.php';
$content = ob_get_clean();
}

function addFormAction() {

GLOBAL $title, $content;

$title = 'Auteurs- Formulaire';
ob_start();
include '../app/views/authors/addForm.php';
$content = ob_get_clean();
}

function insertAction(PDO $conn, array $data) {
    include_once '../app/models/authorsModel.php';
    $id = AuthorsModel\insertAction($conn, $data);

    header('location: '. BACKOFFICE_BASE_URL. 'authors');  

}

function deleteAction(PDO $conn , int $id) {
    include_once '../app/models/authorsModel.php';
    $return = AuthorsModel\deleteAction($conn, $id);

    header('location: '. BACKOFFICE_BASE_URL. 'authors'); 

}

function editFormAction(PDO $conn, int $id) {
    include_once '../app/models/authorsModel.php';
    $author = AuthorsModel\findOneById($conn, $id);


GLOBAL $title, $content;

$title = 'Auteurs- Modification';
ob_start();
include '../app/views/authors/editForm.php';
$content = ob_get_clean();
}

function updateAction(PDO $conn ,  array $data) {
    include_once '../app/models/authorsModel.php';
    $return = AuthorsModel\updateAction($conn, $data);

    header('location: '. BACKOFFICE_BASE_URL. 'authors'); 
}