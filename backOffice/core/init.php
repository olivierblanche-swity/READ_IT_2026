<?php
// initialisation de l application
/**
 * il faut mettre session_start() dans les 2 fichiers core pour le protection.php
 */

session_start();



require_once '../app/config/params.php';
require_once '../core/constantes.php';
require_once '../core/protection.php';
require_once '../core/connexion.php';
require_once '../core/helpers.php';
