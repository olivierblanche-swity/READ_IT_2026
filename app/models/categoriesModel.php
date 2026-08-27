<?php 

namespace App\Models\CategoriesModel;

use  \PDO;

function findAll(PDO $conn):array
{
    $sql = "SELECT *
            FROM categories 
            ORDER BY name ASC;";

    $rs = $conn->query($sql);
    $categories = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $categories;
        
}