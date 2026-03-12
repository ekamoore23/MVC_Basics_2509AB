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
        $sql = 'SELECT   SMPS.Id
                        ,SMPS.Merk
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

        public function delete($Id)
    {
        $sql = "DELETE
                FROM Sneakers
                WHERE Id = :Id";

        $this->db->query($sql);

        $this->db->bind(':Id', $Id, PDO::PARAM_INT);

        return $this->db->execute();
    }

    public function create($data)
    {
        $sql = "INSERT INTO Sneakers    ( Merk
                                         ,Model
                                         ,Type
                                         ,Prijs
                                         ,Materiaal
                                         ,Gewicht
                                         ,Releasedatum
                                        )
                VALUES (:merk,
                        :model,
                        :type,
                        :prijs,
                        :materiaal,
                        :gewicht,
                        :releasedatum)";
                        
        $this->db->query($sql);
        $this->db->bind(':merk', $data['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $data['model'], PDO::PARAM_STR);
        $this->db->bind(':type', $data['type'], PDO::PARAM_STR);
        $this->db->bind(':prijs', $data['prijs'], PDO::PARAM_STR);
        $this->db->bind(':materiaal', $data['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':gewicht', $data['gewicht'], PDO::PARAM_STR);
        $this->db->bind(':releasedatum', $data['releasedatum'], PDO::PARAM_STR);

        return $this->db->execute();
    }
}