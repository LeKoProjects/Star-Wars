<?php
class Setup
{
    private $connection;

    public function __construct()
    {
        $config = require '../config/database.php';

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

    public function run()
    {
        $query = "SHOW TABLES LIKE 'logs'";
        $stmt = $this->connection->query($query);

        if ($stmt->rowCount() === 0) {
            $this->createLogsTable();
        }
    }

    private function createLogsTable()
    {
        $sql = "
            CREATE TABLE logs (
                id INT AUTO_INCREMENT PRIMARY KEY,
                endpoint VARCHAR(255) NOT NULL,
                method VARCHAR(10) NOT NULL,
                request_payload TEXT NULL,
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP
            );
        ";
    }
}

$setup = new Setup();
$setup->run();
