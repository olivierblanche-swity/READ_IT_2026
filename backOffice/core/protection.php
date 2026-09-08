<?php

/**
 * 
 * protection en cas d ajout dans l url en direct
 */
if(!isset($_SESSION['user'])):
    header('location: '. PUBLIC_BASE_URL.'users/login-form');

endif;