<?php 

namespace App\Controllers\UsersController;

use \PDO;
use \App\Models\UsersModel;

// use \App\models\UsersModel;
// include_once '../app/models/usersModel.php';

function loginFormAction(PDO $conn) {
        GLOBAL $content, $title;
        $title = "Connexion";

        ob_start();
        include '../app/views/users/loginForm.php';
        $content = ob_get_clean();
}

function loginAction (PDO $conn , array $userData) {

        include_once '../app/models/usersModel.php';
        $user = UsersModel\findOneByLoginPwd($conn, $userData);
        

        if ($user):
                $_SESSION['user'] = $user;
                header('location: '. BACKOFFICE_BASE_URL);
        
        else:
                header('location: '. PUBLIC_BASE_URL . 'users/login-form');

        endif;
}

