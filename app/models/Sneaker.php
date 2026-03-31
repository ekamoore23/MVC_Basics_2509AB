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
        $sql = 'SELECT   SNKS.Id
                        ,SNKS.Merk
                        ,SNKS.Model
                        ,SNKS.Type
                        ,SNKS.Prijs
                        ,SNKS.Materiaal
                        ,CONCAT(SNKS.Gewicht, " g") as Gewicht
                        ,DATE_FORMAT(SNKS.Releasedatum, "%d/%m/%Y") as Releasedatum
                    
                FROM Sneakers as SNKS

                ORDER BY SNKS.Prijs DESC
                        ,SNKS.Gewicht DESC
                        ,SNKS.Releasedatum DESC';

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

    public function getSneakerById($id)
    {
        $sql = 'SELECT  SNKS.Id
                       ,SNKS.Merk
                       ,SNKS.Model
                       ,SNKS.Type
                       ,SNKS.Prijs
                       ,SNKS.Materiaal
                       ,SNKS.Gewicht
                       ,SNKS.Releasedatum

                FROM   Sneakers as SNKS
                WHERE  SNKS.Id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->single();
    }

    public function updateSneaker($data)
    {
        $sql = "UPDATE Sneakers as SNKS
                SET      SNKS.Merk = :merk
                        ,SNKS.Model = :model
                        ,SNKS.Type = :type
                        ,SNKS.Prijs = :prijs
                        ,SNKS.Materiaal = :materiaal
                        ,SNKS.Gewicht = :gewicht
                        ,SNKS.Releasedatum = :releasedatum
                WHERE SNKS.Id = :id";

        $this->db->query($sql);
        $this->db->bind(':id', $data['id'], PDO::PARAM_INT);
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