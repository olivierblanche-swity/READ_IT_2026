<?php

/**
 * ../app/models/postsModel.php
 */

namespace App\Models\PostsModel;

use PDO;

function findAll(PDO $conn, int $page = 1, bool $withNextPage = false): array
{
    $page = max(1, $page);
    $offset = 0;
    $limit = $withNextPage ? ($page * 10) + 1 : 10;

    $sql = "SELECT *
            FROM posts
            ORDER BY created_at DESC
            LIMIT {$limit} OFFSET {$offset};";

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

function search(PDO $conn, string $query): array
{
    $search = trim(str_replace('-', ' ', $query));

    if ($search === '') {
        return findAll($conn);
    }

    $terms = preg_split('/\s+/', $search);
    $terms = array_filter($terms, fn($term) => $term !== '');

    if (empty($terms)) {
        return findAll($conn);
    }

    $conditions = [];
    $params = [];

    foreach ($terms as $index => $term) {
        $conditions[] = "title LIKE :term{$index}";
        $params[":term{$index}"] = '%' . $term . '%';
    }

    $sql = "SELECT *
            FROM posts
            WHERE " . implode(' OR ', $conditions) . "
            ORDER BY created_at DESC;";

    $rs = $conn->prepare($sql);
    foreach ($params as $key => $value) {
        $rs->bindValue($key, $value, PDO::PARAM_STR);
    }
    $rs->execute();
    $posts = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);

    return $posts;
}
