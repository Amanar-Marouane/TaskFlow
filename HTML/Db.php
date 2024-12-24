<?php

class Db
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "analikayn";
    private $dbname = "taskflow";

    public function connect()
    {
        try {
            $dsn = "mysql:host=$this->servername;dbname=$this->dbname";
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $pdo = new PDO($dsn, $this->username, $this->password, $options);
            echo"<script>console.log('Connect seccesfuly')</script>";
            return $pdo;
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}
