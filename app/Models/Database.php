<?php

class Database
{
    private $connection;

    public function __construct()
    {
        $config = require __DIR__ . '/../../config/database.php';

        try {
            $this->connection = new PDO(
                "mysql:host={$config['host']};dbname={$config['database']}",
                $config['username'],
                $config['password']
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Erro ao conectar ao banco de dados: ' . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
