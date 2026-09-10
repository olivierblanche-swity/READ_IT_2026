<?php

namespace App\Models\tagsModel;

use  \PDO;

function findAll(PDO $conn): array
{
    $sql = "SELECT *
            FROM tags 
            ORDER BY id ASC;";

    $rs = $conn->query($sql);
    $tags = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $tags;
}

function findOneById(PDO $conn, int $id)
{

    $sql = "SELECT *
            FROM tags
            WHERE id= :id;";

    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    $tag = $rs->fetch(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $tag;
}

function insertAction(PDO $conn, array $data)
{
    $sql = "INSERT INTO tags
            SET name = :name;";

    $rs = $conn->prepare($sql);
    $rs->bindValue(':name', $data['name'], PDO::PARAM_STR);
    $rs->execute();
    return intval($conn->lastInsertId());
}

function deleteAction(PDO $conn, int $id)
{
    $sql = "DELETE FROM tags
            WHERE id = :id;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    return intval($rs->execute());
}

function updateAction(PDO $conn, array $data){
    $sql = "UPDATE tags
            SET name = :name
            WHERE id = :id;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':name', $data['name'] ?? '', PDO::PARAM_STR);
    $rs->bindValue(':id', $data['id'] ?? 0, PDO::PARAM_INT);
    return intval($rs->execute());
}