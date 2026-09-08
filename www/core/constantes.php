<?php

// autre constante
define('PUBLIC_FOLDER', 'www');
define('ADMIN_FOLDER', 'backOffice');

define('PUBLIC_BASE_URL', $_SERVER['REQUEST_SCHEME'].'://'
            . $_SERVER['HTTP_HOST']
            . dirname($_SERVER['PHP_SELF']).'/' );

define('BACKOFFICE_BASE_URL', $_SERVER['REQUEST_SCHEME'].'://'
            . $_SERVER['HTTP_HOST']
            . str_replace(PUBLIC_FOLDER, ADMIN_FOLDER, dirname($_SERVER['PHP_SELF']).'/' ));