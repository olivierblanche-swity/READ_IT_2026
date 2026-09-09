<?php

/**
 * ../app/controller/usersController.php
 */

namespace App\Controllers\UsersController;

use \PDO;
use \App\Models\PostsModel;
use \App\Models\TagsModel;
use \App\Models\CategoriesModel;
use \App\Models\AuthorsModel;
use \App\Models\CommentsModel;

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