<?php

// autre constante
define('PUBLIC_FOLDER', 'www');
define('ADMIN_FOLDER', 'backOffice');

define('BACKOFFICE_BASE_URL', $_SERVER['REQUEST_SCHEME'] . '://'
    . $_SERVER['HTTP_HOST']
    . dirname($_SERVER['PHP_SELF']) . '/');

define('PUBLIC_BASE_URL', $_SERVER['REQUEST_SCHEME'] . '://'
    . $_SERVER['HTTP_HOST']
    . str_replace(ADMIN_FOLDER, PUBLIC_FOLDER,  dirname($_SERVER['PHP_SELF']) . '/'));
