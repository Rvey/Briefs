<?php


class Rdv extends Database
{
    public function insertDate($rdv_id, $time, $date, $token): bool
    {
        $sql = 'INSERT INTO rdv(rdv_id ,time ,date ,token) values (?,?,?,?)';
        $query = $this->connect()->prepare($sql);
        return $query->execute([$rdv_id, $time, $date, $token]);
    }

    public function getRdv($date): array
    {
        $sql = "SELECT *  FROM rdv WHERE date = ? ";
        $result = $this->connect()->prepare($sql);
        $result->execute([$date]);
        return $result->fetchAll();
    }

    public function getUserRdv($token): array
    {
        $sql = "SELECT *  FROM rdv WHERE token = ? order by date ";
        $result = $this->connect()->prepare($sql);
        $result->execute([$token]);
        return $result->fetchAll();
    }

    public function DeleteRdv($id)
    {
        $sql = "DELETE FROM rdv WHERE id = ?";
        $result = $this->connect()->prepare($sql);
        $result->execute([$id]);
    }

}