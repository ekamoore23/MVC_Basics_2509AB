<?php

class Zangeres
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllZangeressen()
    {
        $sql = 'SELECT   ZGRS.Id
                        ,ZGRS.Naam
                        ,ZGRS.Land
                        ,ZGRS.GeschatVermogen
                        ,ZGRS.Genre
                        ,DATE_FORMAT(ZGRS.Geboortedatum, "%d/%m/%Y") as Geboortedatum
                        ,ZGRS.AantalAlbums
                        ,ZGRS.ActiefSinds
                        ,ZGRS.BekendVan
                    
                FROM Zangeressen as ZGRS

                ORDER BY ZGRS.GeschatVermogen DESC
                        ,ZGRS.AantalAlbums DESC
                        ,ZGRS.ActiefSinds DESC';

        $this->db->query($sql);

        return $this->db->resultset();
    }

    public function delete($Id)
    {
        $sql = "DELETE
                FROM Zangeressen
                WHERE Id = :Id";

        $this->db->query($sql);

        $this->db->bind(':Id', $Id, PDO::PARAM_INT);

        return $this->db->execute();
    }

    public function create($data)
    {
        $sql = "INSERT INTO Zangeressen ( Naam
                                         ,Land
                                         ,GeschatVermogen
                                         ,Genre
                                         ,Geboortedatum
                                         ,AantalAlbums
                                         ,ActiefSinds
                                         ,BekendVan
                                        )
                VALUES ( :naam
                        ,:land
                        ,:geschatvermogen
                        ,:genre
                        ,:geboortedatum
                        ,:aantalalbums
                        ,:actiefsinds
                        ,:bekendvan
                        )";

        $this->db->query($sql);
        $this->db->bind(':naam', $data['naam'], PDO::PARAM_STR);
        $this->db->bind(':land', $data['land'], PDO::PARAM_STR);
        $this->db->bind(':geschatvermogen', $data['geschatvermogen'], PDO::PARAM_STR);
        $this->db->bind(':genre', $data['genre'], PDO::PARAM_STR);
        $this->db->bind(':geboortedatum', $data['geboortedatum'], PDO::PARAM_STR);
        $this->db->bind(':aantalalbums', $data['aantalalbums'], PDO::PARAM_INT);
        $this->db->bind(':actiefsinds', $data['actiefsinds'], PDO::PARAM_INT);
        $this->db->bind(':bekendvan', $data['bekendvan'], PDO::PARAM_STR);

        return $this->db->execute();
    }

    public function getZangeresById($id)
    {
        $sql = 'SELECT   ZGRS.Id
                        ,ZGRS.Naam
                        ,ZGRS.Land
                        ,ZGRS.GeschatVermogen
                        ,ZGRS.Genre
                        ,ZGRS.Geboortedatum
                        ,ZGRS.AantalAlbums
                        ,ZGRS.ActiefSinds
                        ,ZGRS.BekendVan

                FROM    Zangeressen as ZGRS
                WHERE   ZGRS.Id = :id';

        $this->db->query($sql);
        $this->db->bind(':id', $id, PDO::PARAM_INT);

        return $this->db->single();
    }

    public function updateZangeres($data)
    {
        $sql = "UPDATE Zangeressen as ZGRS
                SET      ZGRS.Naam = :naam
                        ,ZGRS.Land = :land
                        ,ZGRS.GeschatVermogen = :geschatvermogen
                        ,ZGRS.Genre = :genre
                        ,ZGRS.Geboortedatum = :geboortedatum
                        ,ZGRS.AantalAlbums = :aantalalbums
                        ,ZGRS.ActiefSinds = :actiefsinds
                        ,ZGRS.BekendVan = :bekendvan
                WHERE ZGRS.Id = :id";

        $this->db->query($sql);
        $this->db->bind(':id', $data['id'], PDO::PARAM_INT);
        $this->db->bind(':naam', $data['naam'], PDO::PARAM_STR);
        $this->db->bind(':land', $data['land'], PDO::PARAM_STR);
        $this->db->bind(':geschatvermogen', $data['geschatvermogen'], PDO::PARAM_STR);
        $this->db->bind(':genre', $data['genre'], PDO::PARAM_STR);
        $this->db->bind(':geboortedatum', $data['geboortedatum'], PDO::PARAM_STR);
        $this->db->bind(':aantalalbums', $data['aantalalbums'], PDO::PARAM_INT);
        $this->db->bind(':actiefsinds', $data['actiefsinds'], PDO::PARAM_INT);
        $this->db->bind(':bekendvan', $data['bekendvan'], PDO::PARAM_STR);

        return $this->db->execute();
    }
}