<?php 

namespace App\Models\AuthorsModel;

use  \PDO;

function findAllByPostId(PDO $conn, string $id):array 
{
    $sql = "SELECT a.id AS authorId, a.lastname, a.firstname, a.biography, a.image as authorImage
            FROM posts p
            JOIN authors a ON p.author_id = a.id 
            WHERE p.id = :id;";

    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    $author = $rs->fetch(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $author;
}