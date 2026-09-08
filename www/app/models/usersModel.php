<?php

namespace App\Models\UsersModel;

use \PDO;

function findOneByLoginPwd(PDO $conn, array $userData ) {

        $sql = "SELECT *
                FROM users
                WHERE login = :login
                AND pwd = :pwd;";

        $rs = $conn->prepare($sql);
        $rs->bindValue(':login', $userData['login'], PDO::PARAM_STR);
        $rs->bindValue(':pwd', $userData['pwd'], PDO::PARAM_STR);
        $rs->execute();
        return $rs->fetch(PDO::FETCH_ASSOC);
}