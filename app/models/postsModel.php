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

function findOneById(PDO $conn, string $id) :array {
    $sql = "SELECT *
            FROM posts
            WHERE id = :id;";

    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    $post = $rs->fetch(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $post;
}