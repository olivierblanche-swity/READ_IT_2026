<?php 

namespace App\Controllers\UsersController;

use \PDO;

// use \App\models\UsersModel;
// include_once '../app/models/usersModel.php;

function loginFormAction(PDO $conn) {
        GLOBAL $content, $title;
        $title = "Connexion";

        ob_start();
        include '../app/views/users/loginForm.php';
        $content = ob_get_clean();
}

function loginAction (PDO $conn , array $userData) {
        
}

