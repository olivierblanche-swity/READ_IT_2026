<?php

/**
 * ../app/controller/usersController.php
 */

namespace App\Controllers\UsersController;

use \PDO;
use \App\Models\AuthorsModel;
use \App\Models\UsersModel;

function dashboardAction(PDO $conn){

GLOBAL $content, $title;

$title = 'Dashboard';
ob_start();
include '../app/views/users/dashboard.php';
$content = ob_get_clean();


}

function logoutAction() {

    unset($_SESSION['user']);

    header('location: '.PUBLIC_BASE_URL);

}

function indexAction(PDO $conn) {

include_once '../app/models/usersModel.php';

$users = UsersModel\findAll($conn);

GLOBAL $title, $content;

$title = 'Utilisateurs';
ob_start();
include '../app/views/users/index.php';
$content = ob_get_clean();
}

function addFormAction() {

GLOBAL $title, $content;

$title = 'Utilisateurs- Formulaire';
ob_start();
include '../app/views/users/addForm.php';
$content = ob_get_clean();
}

function insertAction(PDO $conn, array $data) {
    include_once '../app/models/usersModel.php';
    $id = UsersModel\insertAction($conn, $data);

    header('location: '. BACKOFFICE_BASE_URL. 'users');  

}

function deleteAction(PDO $conn , int $id) {
    include_once '../app/models/usersModel.php';
    $return = UsersModel\deleteAction($conn, $id);

    header('location: '. BACKOFFICE_BASE_URL. 'users'); 

}

function editFormAction(PDO $conn, int $id) {
    include_once '../app/models/usersModel.php';
    $user = UsersModel\findOneById($conn, $id);


GLOBAL $title, $content;

$title = 'Utilisateurs- Modification';
ob_start();
include '../app/views/users/editForm.php';
$content = ob_get_clean();
}

function updateAction(PDO $conn ,  array $data) {
    include_once '../app/models/usersModel.php';
    $return = UsersModel\updateAction($conn, $data);

    header('location: '. BACKOFFICE_BASE_URL. 'users'); 
}
