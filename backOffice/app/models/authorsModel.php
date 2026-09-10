<?php

namespace App\Models\AuthorsModel;

use  \PDO;

function findAll(PDO $conn): array
{
    $sql = "SELECT *
            FROM authors 
            ORDER BY id ASC;";

    $rs = $conn->query($sql);
    $authors = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $authors;
}

function findOneById(PDO $conn, int $id)
{

    $sql = "SELECT *
            FROM authors
            WHERE id= :id;";

    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    $author = $rs->fetch(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $author;
}

function insertAction(PDO $conn, array $data)
{
    $sql = "INSERT INTO authors
            SET lastname = :lastname,
                firstname = :firstname,
                biography = :biography,
                image = :image;";

    $rs = $conn->prepare($sql);
    $rs->bindValue(':lastname', $data['lastname'], PDO::PARAM_STR);
    $rs->bindValue(':firstname', $data['firstname'], PDO::PARAM_STR);
    $rs->bindValue(':biography', $data['biography'], PDO::PARAM_STR);
    $rs->bindValue(':image', $data['image'], PDO::PARAM_STR);
    $rs->execute();
    return intval($conn->lastInsertId());
}

function deleteAction(PDO $conn, int $id)
{
    $sql = "DELETE FROM authors
            WHERE id = :id;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    return intval($rs->execute());
}

function updateAction(PDO $conn, array $data)
{
    $sql = "UPDATE authors
            SET lastname = :lastname,
                firstname = :firstname,
                biography = :biography,
                image = :image
            WHERE id = :id;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':lastname', $data['lastname'], PDO::PARAM_STR);
    $rs->bindValue(':firstname', $data['firstname'], PDO::PARAM_STR);
    $rs->bindValue(':biography', $data['biography'], PDO::PARAM_STR);
    $rs->bindValue(':image', $data['image'], PDO::PARAM_STR);
    $rs->bindValue(':id', $data['id'] ?? 0, PDO::PARAM_INT);
    return intval($rs->execute());
}
