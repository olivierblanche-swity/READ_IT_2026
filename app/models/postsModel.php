<?php

/**
 * ../app/models/postsModel.php
 */

namespace App\Models\PostsModel;

use PDO;

function findAll(PDO $conn): array
{

    $sql = "SELECT *
            FROM posts
            ORDER BY created_at DESC
            LIMIT 10;";

    $rs = $conn->query($sql);
    $posts = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $posts;
}

function findlast(PDO $conn): array
{

    $sql = "SELECT p.id AS postsId, p.title AS postsTitle, p.image AS postsImage,
            p.created_at AS postsCreatedAt, a.id AS authorId,
            a.firstname, a.lastname, COUNT(c.id) AS commentsCount
            FROM posts p
            JOIN authors a ON p.author_id = a.id
            LEFT JOIN comments c ON c.post_id = p.id
            GROUP BY p.id, p.title, p.image, p.created_at,
                     a.id, a.firstname, a.lastname
            ORDER BY p.created_at DESC
            LIMIT 3;";

    $rs = $conn->query($sql);
    $posts = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $posts;
}

function findOneById(PDO $conn, string $id): array
{
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



