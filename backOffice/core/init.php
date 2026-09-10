<?php
// initialisation de l application

/**
 * il faut mettre session_start() dans les 2 fichiers core pour le protection.php
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../app/config/params.php';
require_once __DIR__ . '/../core/constantes.php';
require_once __DIR__ . '/../core/protection.php';
require_once __DIR__ . '/../core/connexion.php';
require_once __DIR__ . '/../core/helpers.php';
