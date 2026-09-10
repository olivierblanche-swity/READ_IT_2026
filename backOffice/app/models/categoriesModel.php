<?php

namespace App\Models\CategoriesModel;

use  \PDO;

function findAll(PDO $conn): array
{
    $sql = "SELECT *
            FROM categories 
            ORDER BY id ASC;";

    $rs = $conn->query($sql);
    $categories = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $categories;
}

function findOneById(PDO $conn, int $id)
{

    $sql = "SELECT *
            FROM categories
            WHERE id= :id;";

    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    $category = $rs->fetch(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $category;
}

function insert(PDO $conn, array $data)
{
    $sql = "INSERT INTO categories
            SET name = :name;";

    $rs = $conn->prepare($sql);
    $rs->bindValue(':name', $data['name'], PDO::PARAM_STR);
    $rs->execute();
    return intval($conn->lastInsertId());
}

function delete(PDO $conn, int $id)
{
    $sql = "DELETE FROM categories
            WHERE id = :id;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    return intval($rs->execute());
}

function update(PDO $conn, array $data){
    $sql = "UPDATE categories
            SET name = :name
            WHERE id = :id;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':name', $data['name'] ?? '', PDO::PARAM_STR);
    $rs->bindValue(':id', $data['id'] ?? 0, PDO::PARAM_INT);
    return intval($rs->execute());
}