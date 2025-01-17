<?php

class Database
{
    private $connection;

    public function __construct()
    {
        $config = require __DIR__ . '/../../config/database.php';

        $this->connection = new PDO(
            "mysql:host={$config['host']};dbname={$config['database']}",
            $config['username'],
            $config['password']
        );
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
