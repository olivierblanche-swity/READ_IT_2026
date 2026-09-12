<?php

/**
 * ../app/models/postsModel.php
 */

namespace App\Models\PostsModel;

use \PDO;

function countAll(PDO $conn): int
{
    $sql = "SELECT COUNT(*) AS total
            FROM posts;";

    $rs = $conn->query($sql);
    $row = $rs->fetch(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);

    return (int) ($row['total'] ?? 0);
}

function findAll(PDO $conn, int $page = 1, bool $withNextPage = false, int $limit = 10): array
{
    $page = max(1, $page);
    $limit = max(1, $limit);
    $offset = ($page - 1) * $limit;
    $queryLimit = $withNextPage ? $limit + 1 : $limit;

    $sql = "SELECT p.*, a.id AS authorId, a.firstname, a.lastname,
                   COUNT(c.id) AS commentsCount
            FROM posts p
            JOIN authors a ON p.author_id = a.id
            LEFT JOIN comments c ON c.post_id = p.id
            GROUP BY p.id, p.title, p.created_at, p.resume, p.image,
                     p.content, p.author_id, p.category_id,
                     a.id, a.firstname, a.lastname
            ORDER BY p.created_at DESC
            LIMIT {$queryLimit}
            OFFSET {$offset};";

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
