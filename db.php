<?php
    require './vendor/autoload.php';
    Dotenv\Dotenv::createImmutable(__DIR__)->load();

    $dsn = "mysql:dbname=".$_ENV['DB_NAME'].";host=localhost;";
    $user = $_ENV['DB_USER'];
    $password = $_ENV['DB_PASSWORD'];

    try {
        $pdo = new PDO($dsn, $user, $password);

        $query = "SELECT * FROM users";
        $stmt = $pdo->query($query);

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo $row["name"];
        }
    } catch(PDOException $error) {
        echo $error;
    }
    
    $pdo = null;
