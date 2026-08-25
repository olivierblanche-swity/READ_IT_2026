<?php

try {
    $conn = new PDO('mysql:host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPWD);
} catch (PDOException $e) {
    echo $e->getMessage();
}
