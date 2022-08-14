<?php
include_once __DIR__ . '/../lib/db.php';
include_once __DIR__ . '/../lib/session.php';

$pdo = new ConnectDB();
$session = new Session();

$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');

$sql = 'UPDATE users SET name = "' . $name . '", updated_at = Now() WHERE id = ' . $_SESSION['current_user'] . ';';
$execute_sql = $pdo->update($sql);

if ($execute_sql) {
    $_SESSION['current_user_alias'] = $name;
    header('Location: /user');
} else {
    echo 'false';
}
