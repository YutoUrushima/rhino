<?php
include_once __DIR__ . '/../lib/db.php';
session_start();

$pdo = new ConnectDB();
$title = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
$content = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8');
$article_id = htmlspecialchars($_POST['article_id'], ENT_QUOTES, 'UTF-8');

$sql = 'UPDATE articles SET title = "' . $title . '", content = "' . $content . '", updated_at = Now() WHERE id = ' . $article_id . ';';
$execute_sql = $pdo->update($sql);

if ($execute_sql) {
    header('Location: /user');
} else {
    echo 'false';
}
