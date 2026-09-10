<?php

/**
 * ../app/models/postsModel.php
 */

namespace App\Models\PostsModel;

use \PDO;

function findAll(PDO $conn): array
{
    $sql = "SELECT p.*, a.id AS authorId, a.firstname, a.lastname,
                    cat.name AS categoryName,
                    (SELECT COUNT(*) FROM comments c WHERE c.post_id = p.id) AS commentsCount
            FROM posts p
            LEFT JOIN authors a ON p.author_id = a.id
            LEFT JOIN categories cat ON p.category_id = cat.id
            ORDER BY p.created_at DESC, p.id DESC";

    $rs = $conn->query($sql);
    $posts = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();

    $rs = $conn->query("SELECT pht.post_id, t.name
                        FROM posts_has_tags pht
                        JOIN tags t ON t.id = pht.tag_id
                        ORDER BY t.name, t.id");
    $tagsByPost = [];
    foreach ($rs->fetchAll(PDO::FETCH_ASSOC) as $tag) {
        $tagsByPost[$tag['post_id']][] = $tag['name'];
    }
    $rs->closeCursor();

    foreach ($posts as &$post) {
        $post['tags'] = $tagsByPost[$post['id']] ?? [];
    }
    unset($post);

    return $posts;
}

function findOneById(PDO $conn, string $id): ?array
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
    if (!$post) { return null; }
    $rs = $conn->prepare('SELECT tag_id FROM posts_has_tags WHERE post_id = :id');
    $rs->execute(['id' => $id]);
    $post['tags'] = $rs->fetchAll(PDO::FETCH_COLUMN);
    return $post;
}


function delete(PDO $conn, int $id)
{
    $conn->beginTransaction();

    $rs = $conn->prepare('DELETE FROM posts_has_tags WHERE post_id = :id');
    $rs->execute(['id' => $id]);

    $rs = $conn->prepare('DELETE FROM comments WHERE post_id = :id');
    $rs->execute(['id' => $id]);

    $rs = $conn->prepare('DELETE FROM posts WHERE id = :id');
    $rs->execute(['id' => $id]);

    $conn->commit();
}

function insert(PDO $conn, array $data)
{
    $conn->beginTransaction();
    $sql = "INSERT INTO posts SET
            title = :title,
            resume = :resume,
            image = :image,
            content = :content,
            author_id = :author_id,
            category_id = :category_id, created_at = NOW()";

    $rs = $conn->prepare($sql);
    $rs->bindValue(':title', $data['title'], PDO::PARAM_STR);
    $rs->bindValue(':resume', $data['resume'], PDO::PARAM_STR);
    $rs->bindValue(':image', $data['image'], PDO::PARAM_STR);
    $rs->bindValue(':content', $data['content'], PDO::PARAM_STR);
    $rs->bindValue(':author_id', $data['author_id'], PDO::PARAM_INT);
    $rs->bindValue(':category_id', $data['category_id'], PDO::PARAM_INT);
    $rs->execute();
    $id = (int) $conn->lastInsertId();

    $rs = $conn->prepare('INSERT INTO posts_has_tags (post_id, tag_id) VALUES (:post_id, :tag_id)');
    foreach (array_unique($data['tags'] ?? []) as $tagId) {
        $rs->bindValue(':post_id', $id, PDO::PARAM_INT);
        $rs->bindValue(':tag_id', $tagId, PDO::PARAM_INT);
        $rs->execute();
    }

    $conn->commit();
    return $id;
}

function update(PDO $conn, int $id, array $data)
{
    $conn->beginTransaction();
    $sql = "UPDATE posts SET
            title = :title,
            resume = :resume,
            image = :image,
            content = :content,
            author_id = :author_id,
            category_id = :category_id WHERE id = :id";

    $rs = $conn->prepare($sql);
    $rs->bindValue(':title', $data['title'], PDO::PARAM_STR);
    $rs->bindValue(':resume', $data['resume'], PDO::PARAM_STR);
    $rs->bindValue(':image', $data['image'], PDO::PARAM_STR);
    $rs->bindValue(':content', $data['content'], PDO::PARAM_STR);
    $rs->bindValue(':author_id', $data['author_id'], PDO::PARAM_INT);
    $rs->bindValue(':category_id', $data['category_id'], PDO::PARAM_INT);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();

    $rs = $conn->prepare('DELETE FROM posts_has_tags WHERE post_id = :id');
    $rs->execute(['id' => $id]);

    $rs = $conn->prepare('INSERT INTO posts_has_tags (post_id, tag_id) VALUES (:post_id, :tag_id)');
    foreach (array_unique($data['tags'] ?? []) as $tagId) {
        $rs->bindValue(':post_id', $id, PDO::PARAM_INT);
        $rs->bindValue(':tag_id', $tagId, PDO::PARAM_INT);
        $rs->execute();
    }

    $conn->commit();
    return $id;
}
