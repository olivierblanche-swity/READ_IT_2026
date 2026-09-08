<?php

namespace App\Models\CategoriesModel;

use  \PDO;

function findAll(PDO $conn): array
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

function findAllByCategoryId(PDO $conn, string $id): array
{

    $sql = "SELECT *
            FROM posts
            WHERE category_id = :id
            ORDER BY created_at DESC
            LIMIT 10;";

    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    $posts = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $posts;
}
