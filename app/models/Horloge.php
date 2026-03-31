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
        $sql = 'SELECT   HRLGS.Id
                        ,HRLGS.Merk
                        ,HRLGS.Model
                        ,HRLGS.Prijs
                        ,HRLGS.Materiaal
                        ,CONCAT(HRLGS.Gewicht, " g") as Gewicht
                        ,DATE_FORMAT(HRLGS.Releasedatum, "%d/%m/%Y") as Releasedatum
                        ,HRLGS.Waterdichtheid
                        ,HRLGS.Type
                        ,HRLGS.UniekKenmerk
                    
                FROM Horloges as HRLGS

                ORDER BY HRLGS.Prijs DESC';


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

    public function create($data)
    {
        $sql = "INSERT INTO Horloges    ( Merk
                                         ,Model
                                         ,Prijs
                                         ,Materiaal
                                         ,Gewicht
                                         ,Releasedatum
                                         ,Waterdichtheid
                                         ,Type
                                         ,UniekKenmerk
                                        )
                VALUES (:merk,
                        :model,
                        :prijs,
                        :materiaal,
                        :gewicht,
                        :releasedatum,
                        :waterdichtheid,
                        :type,
                        :uniekkenmerk)";
                        
        $this->db->query($sql);
        $this->db->bind(':merk', $data['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $data['model'], PDO::PARAM_STR);
        $this->db->bind(':prijs', $data['prijs'], PDO::PARAM_STR);
        $this->db->bind(':materiaal', $data['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':gewicht', $data['gewicht'], PDO::PARAM_STR);
        $this->db->bind(':releasedatum', $data['releasedatum'], PDO::PARAM_STR);
        $this->db->bind(':waterdichtheid', $data['waterdichtheid'], PDO::PARAM_STR);
        $this->db->bind(':type', $data['type'], PDO::PARAM_STR);
        $this->db->bind(':uniekkenmerk', $data['uniekkenmerk'], PDO::PARAM_STR);

        return $this->db->execute();
    }

    public function getHorlogeById($id)
    {
        $sql = 'SELECT  HRLGS.Id
                       ,HRLGS.Merk
                       ,HRLGS.Model
                       ,HRLGS.Prijs
                       ,HRLGS.Materiaal
                       ,HRLGS.Gewicht
                       ,HRLGS.Releasedatum
                       ,HRLGS.Waterdichtheid
                       ,HRLGS.Type
                       ,HRLGS.UniekKenmerk

                FROM   Horloges as HRLGS
                WHERE  HRLGS.Id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->single();
    }

    public function updateHorloge($data)
    {
        $sql = "UPDATE Horloges as HRLGS
                SET      HRLGS.Merk = :merk
                        ,HRLGS.Model = :model
                        ,HRLGS.Prijs = :prijs
                        ,HRLGS.Materiaal = :materiaal
                        ,HRLGS.Gewicht = :gewicht
                        ,HRLGS.Releasedatum = :releasedatum
                        ,HRLGS.Waterdichtheid = :waterdichtheid
                        ,HRLGS.Type = :type
                        ,HRLGS.UniekKenmerk = :uniekkenmerk
                WHERE HRLGS.Id = :id";

        $this->db->query($sql);
        $this->db->bind(':id', $data['id'], PDO::PARAM_INT);
        $this->db->bind(':merk', $data['merk'], PDO::PARAM_STR);
        $this->db->bind(':model', $data['model'], PDO::PARAM_STR);
        $this->db->bind(':prijs', $data['prijs'], PDO::PARAM_STR);
        $this->db->bind(':materiaal', $data['materiaal'], PDO::PARAM_STR);
        $this->db->bind(':gewicht', $data['gewicht'], PDO::PARAM_STR);
        $this->db->bind(':releasedatum', $data['releasedatum'], PDO::PARAM_STR);
        $this->db->bind(':waterdichtheid', $data['waterdichtheid'], PDO::PARAM_STR);
        $this->db->bind(':type', $data['type'], PDO::PARAM_STR);
        $this->db->bind(':uniekkenmerk', $data['uniekkenmerk'], PDO::PARAM_STR);

        return $this->db->execute();
    }
}