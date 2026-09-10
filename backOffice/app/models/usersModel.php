<?php

namespace App\Models\UsersModel;

use \PDO;

function findAll(PDO $conn): array
{
    $sql = "SELECT *
            FROM users 
            ORDER BY id ASC;";

    $rs = $conn->query($sql);
    $users = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $users;
}

function findOneById(PDO $conn, int $id)
{

    $sql = "SELECT *
            FROM users
            WHERE id= :id;";

    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    $user = $rs->fetch(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $user;
}

function insert(PDO $conn, array $data)
{


    $hashedPassword = password_hash($data['pwd'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users
            SET login = :login,
                pwd = :pwd,
                firstname = :firstname,
                lastname = :lastname,
                status = :status,
                created_at = NOW()";

    $rs = $conn->prepare($sql);
    $rs->bindValue(':login', $data['login'], PDO::PARAM_STR);
    $rs->bindValue(':pwd', $hashedPassword, PDO::PARAM_STR);
    $rs->bindValue(':firstname', $data['firstname'], PDO::PARAM_STR);
    $rs->bindValue(':lastname', $data['lastname'], PDO::PARAM_STR);
    $rs->bindValue(':status', $data['status'], PDO::PARAM_INT);
    $rs->execute();

    return intval($conn->lastInsertId());
}

function delete(PDO $conn, int $id)
{
    if ($id === 1) {
        return 0;
    }

    $sql = "DELETE FROM users
            WHERE id = :id;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    return intval($rs->execute());
}

function update(PDO $conn, array $data)
{
    $newPassword = $data['pwd'] ?? '';
    $changePassword = $newPassword !== '';

    $sql = "UPDATE users
            SET login = :login,
                firstname = :firstname,
                lastname = :lastname,
                status = :status";

    if ($changePassword) {
        $sql .= ", pwd = :pwd";
    }

    $sql .= " WHERE id = :id";

    $rs = $conn->prepare($sql);
    $rs->bindValue(':login', $data['login'], PDO::PARAM_STR);
    $rs->bindValue(':firstname', $data['firstname'], PDO::PARAM_STR);
    $rs->bindValue(':lastname', $data['lastname'], PDO::PARAM_STR);
    $rs->bindValue(':status', $data['status'], PDO::PARAM_INT);
    $rs->bindValue(':id', $data['id'] ?? 0, PDO::PARAM_INT);

    if ($changePassword) {
        $rs->bindValue(
            ':pwd',
            password_hash($newPassword, PASSWORD_DEFAULT),
            PDO::PARAM_STR
        );
    }

    return intval($rs->execute());
}