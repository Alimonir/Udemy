<?php

declare(strict_types=1);
class Database
{
    private $db;
    public function connect(): PDO
    {
        if (!$this->db) {
            try {
                $this->db = new PDO("mysql:hostname=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $th) {
                die("Error (" . $th->getCode() . "): " . $th->getMessage());
            }
        }
        return $this->db;
    }
    /**
     * Summary of query
     * @param mixed $query
     * @param mixed $data
     * @return array|bool
     * have prepare statement & fetch data
     */
    public function query($query, $data = [])
    {
        $con = $this->connect();
        $stmd = $con->prepare($query);
        if ($stmd->execute($data)) {
            $result =  $stmd->fetchAll(PDO::FETCH_OBJ);
            if (is_array($result) && count($result) > 0) {
                return $result;
            }
        }
        return false;
    }

    public function create_tales()
    //user table
    {
        $query = "CREATE TABLE IF NOT EXISTS `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
     `email` varchar(100) NOT NULL,
     `firstname` varchar(30) NOT NULL,
     `lastname` varchar(30) NOT NULL,
     `password` varchar(200) NOT NULL,
     `role` varchar(30) NOT NULL,
     `date` date default null,
     PRIMARY KEY (`id`),
     KEY `id` (`id`),
     KEY `email` (`email`),
     KEY `firstname` (`firstname`),
     KEY `lastname` (`lastname`),
     KEY `date` (`date`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";
        $this->query($query);
    }
}
