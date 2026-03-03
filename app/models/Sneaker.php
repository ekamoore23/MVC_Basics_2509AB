<?php

class Sneaker
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllSneakers()
    {
        $sql = 'SELECT   SMPS.Merk
                        ,SMPS.Model
                        ,SMPS.Type
                        ,SMPS.Prijs
                        ,SMPS.Materiaal
                        ,CONCAT(SMPS.Gewicht, " g") as Gewicht
                        ,DATE_FORMAT(SMPS.Releasedatum, "%d/%m/%Y") as Releasedatum
                    
                FROM Sneakers as SMPS

                ORDER BY SMPS.Prijs DESC
                        ,SMPS.Gewicht DESC
                        ,SMPS.Releasedatum DESC';

        $this->db->query($sql);

        return $this->db->resultset();
    }
}