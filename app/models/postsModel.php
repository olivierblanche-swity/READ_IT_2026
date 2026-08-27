<?php 

/**
 * ../app/models/postsModel.php
 */

namespace App\Models\PostsModel;

use PDO;

function findAll(PDO $conn) :array  {

    $sql= "SELECT *
            FROM posts
            ORDER BY created_at DESC
            LIMIT 10;";

    $rs = $conn->query($sql);
    $posts = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $posts;        

}