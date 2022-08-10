<?php
require __DIR__ . '/../vendor/autoload.php';
Dotenv\Dotenv::createImmutable(__DIR__ . '/..')->load();

class ConnectDB
{
    public function select($sql)
    {
        $stmt = $this->pdo()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function insert($sql)
    {
        $stmt = $this->pdo()->prepare($sql);
        $stmt->execute();
        return true;
    }
    private function pdo()
    {
        $dsn = 'mysql:dbname=' . $_ENV['DB_NAME'] . ';host=' . $_ENV['DB_HOST'] . ';charset=' . $_ENV['DB_CHARSET'] . ';';
        $user = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASSWORD'];
        try {
            $pdo = new PDO($dsn, $user, $password);
            return $pdo;
        } catch (PDOException $error) {
            echo $error;
            return null;
        } finally {
            $pdo = null;
        }
    }
}
