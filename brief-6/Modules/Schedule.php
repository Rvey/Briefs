<?php


// get schedule

class Schedule extends Database
{
    public function getData(): array
    {
        $sql = "SELECT * FROM schedule";
        $result = $this->connect()->query($sql);
        return $result->fetchAll();
    }


}
