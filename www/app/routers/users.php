<?php


use \App\Controllers\UsersController;

include_once '../app/controllers/usersControllers.php';


switch ($_GET['users']):

    default:

        UsersController\loginFormAction($conn);
        break;
        

endswitch;