<?php 

namespace App\Controllers\CategoriesController;

use \App\Models\CategoriesModel;
use \PDO;

function indexAction(PDO $conn) {

include_once '../app/models/categoriesModel.php';

$categories = CategoriesModel\findAll($conn);

GLOBAL $title, $content;

$title = 'Catégories';
ob_start();
include '../app/views/categories/index.php';
$content = ob_get_clean();
}

function addFormAction() {

GLOBAL $title, $content;

$title = 'Catégories- Formulaire';
ob_start();
include '../app/views/categories/addForm.php';
$content = ob_get_clean();
}

function insertAction(PDO $conn, array $data) {
    include_once '../app/models/categoriesModel.php';
    $id = CategoriesModel\insertAction($conn, $data);

    header('location: '. BACKOFFICE_BASE_URL. 'categories');  

}

function deleteAction(PDO $conn , int $id) {
    include_once '../app/models/categoriesModel.php';
    $return = CategoriesModel\deleteAction($conn, $id);

    header('location: '. BACKOFFICE_BASE_URL. 'categories'); 

}

function editFormAction(PDO $conn, int $id) {
    include_once '../app/models/categoriesModel.php';
    $category = CategoriesModel\findOneById($conn, $id);


GLOBAL $title, $content;

$title = 'Catégories- Modification';
ob_start();
include '../app/views/categories/editForm.php';
$content = ob_get_clean();
}

function updateAction(PDO $conn ,  array $data) {
    include_once '../app/models/categoriesModel.php';
    $return = CategoriesModel\updateAction($conn, $data);

    header('location: '. BACKOFFICE_BASE_URL. 'categories'); 
}