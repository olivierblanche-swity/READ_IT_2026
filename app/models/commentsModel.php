<?php 

namespace App\Models\CommentsModel;

use  \PDO;

function findAllByPostId(PDO $conn, string $id):array 
{
    $sql = "SELECT c.id AS commentsId, c.pseudo, c.content AS commentContent, c.created_at AS commentCreatedAt
            FROM comments c
            WHERE post_id = :id;";

    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    $comments = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $comments;
}

function insertOne(\PDO $conn)
{
    $sql = "INSERT INTO comments 
            SET pseudo = :pseudo,
                content = :content,
                post_id = :post_id,
                created_at = NOW();";
                
    $rs = $conn->prepare($sql);
    
    $rs->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
    $rs->bindValue(':content', $_POST['content'], PDO::PARAM_STR);
    $postId = (int) $_POST['post_id'];
    $rs->bindValue(':post_id', $postId, PDO::PARAM_INT);
    $rs->execute();

    return intval($conn->lastInsertId());
}