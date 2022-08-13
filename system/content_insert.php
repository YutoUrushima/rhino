<?php
include_once __DIR__ . '/../lib/db.php';
session_start();

$pdo = new ConnectDB();
$title = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
$content = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8');

$add_content_sql = 'INSERT INTO articles VALUE (NULL, ' . $_SESSION['current_user'] . ', "' . $title . '", "' . $content . '", Now(), Now())';
$execute_sql = $pdo->insert($add_content_sql);

if ($execute_sql) {
    header('Location: /user');
} else {
    echo 'false';
}
