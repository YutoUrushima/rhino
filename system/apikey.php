<?php
include_once __DIR__ . '/../lib/db.php';
session_start();
use Ramsey\Uuid\Uuid;

$apikey = Uuid::uuid4()->toString();

$pdo = new ConnectDB();

$sql = 'UPDATE users SET api_key = "' . $apikey . '", updated_at = Now() WHERE id = ' . $_SESSION['current_user'] . ';';
$execute_sql = $pdo->update($sql);

if ($execute_sql) {
    header('Location: /user');
} else {
    echo 'false';
}
