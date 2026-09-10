<?php


use \App\Controllers\UsersController;

include_once '../app/controllers/usersController.php';


switch ($_GET['users']):

    case 'login':

        UsersController\loginAction($conn, $_POST);

        break;

    default:

        UsersController\loginFormAction($conn);
        break;
        

endswitch;