<?php 

namespace App\Models\TagsModel;

use \PDO;

function findAll(PDO $conn):array
{
    $sql = "SELECT *
            FROM tags 
            ORDER BY name ASC;";

    $rs = $conn->query($sql);
    $tags = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $tags;
}