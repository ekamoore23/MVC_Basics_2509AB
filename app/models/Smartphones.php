<?php
class Smartphone
{
    private $db;

    public function __construct()
    {
        $this->db = new Database(); // uses DB_* constants from config
    }

    public function getAll()
    {
        try {
            $this->db->query("SELECT * FROM Smartphones WHERE IsActief = 1");
            return $this->db->resultSet(); // returns array of objects
        } catch (PDOException $e) {
            // optionally log $e->getMessage()
            return []; // return empty array if table/DB not available
        }
    }
}