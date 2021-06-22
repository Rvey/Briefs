<?php


class User extends Database
{
    public function getUser($email, $token): array
    {
        $sql = "SELECT *  FROM user WHERE email = ? AND token = ? ";
        $result = $this->connect()->prepare($sql);
        $result->execute([$email, $token]);
        return $result->fetchAll();
    }

    public function insertUser($Name, $lastName, $email, $token): bool
    {
        $sql = 'INSERT INTO user( Name, lastName, email , token) values (?,?,?,?)';
        $query = $this->connect()->prepare($sql);
        return $query->execute([$Name, $lastName, $email, $token]);
    }


}