<?php 

namespace App\Models\CommentsModel;

use \PDO;

function findAllByPostId(PDO $conn, string $id):array 
{
    $sql = "SELECT c.id AS commentsId, c.pseudo, c.content AS commentContent, c.created_at AS commentCreatedAt
            FROM comments c
            WHERE post_id = :id ORDER BY c.created_at DESC, c.id DESC;";

    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    $comments = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $comments;
}

function deleteAction(PDO $conn, int $postId, int $commentId)
{
    $sql = "DELETE FROM comments
            WHERE id = :id
            AND post_id = :post_id";

    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $commentId, PDO::PARAM_INT);
    $rs->bindValue(':post_id', $postId, PDO::PARAM_INT);
    $rs->execute();
    return $rs->rowCount();
}
