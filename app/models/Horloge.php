<?php

class Horloge
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllHorloges()
    {
        $sql = 'SELECT   SMPS.Id
                        ,SMPS.Merk
                        ,SMPS.Model
                        ,SMPS.Prijs
                        ,SMPS.Materiaal
                        ,CONCAT(SMPS.Gewicht, " g") as Gewicht
                        ,DATE_FORMAT(SMPS.Releasedatum, "%d/%m/%Y") as Releasedatum
                        ,SMPS.Waterdichtheid
                        ,SMPS.Type
                        ,SMPS.UniekKenmerk
                    
                FROM Horloges as SMPS

                ORDER BY SMPS.Prijs DESC';


        $this->db->query($sql);

        return $this->db->resultset();
    }

    public function delete($Id)
    {
        $sql = "DELETE
                FROM Horloges
                WHERE Id = :Id";

        $this->db->query($sql);

        $this->db->bind(':Id', $Id, PDO::PARAM_INT);

        return $this->db->execute();
    }
}