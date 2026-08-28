<?php

namespace App\Models\TagsModel;

use \PDO;

function findAll(PDO $conn): array
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

function findAllByPostId(PDO $conn, string $id): array
{
    $sql = "SELECT t.id AS tagsId, t.name AS tagsName 
            FROM posts_has_tags pht
            JOIN tags t ON pht.tag_id = t.id
            WHERE post_id = :id
            ORDER BY t.name ASC;";

    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    $tags = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $tags;
}
