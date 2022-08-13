<?php
include __DIR__ . '/../lib/db.php';
session_start();

$pdo = new ConnectDB();
$email = htmlspecialchars($_POST['signup_id'], ENT_QUOTES, 'UTF-8');
$password = htmlspecialchars($_POST['signup_password'], ENT_QUOTES, 'UTF-8');

$get_sql = 'SELECT email FROM users WHERE email = "' . $email . '";';
$existing_user = $pdo->select($get_sql);

if (count($existing_user) > 0) {
    header('Location: /signup');
}

$create_sql = 'INSERT INTO users VALUEs (NULL, NULL, "' . $email . '", "' . hash('sha256', $password) . '", NULL, Now(), Now())';
$execute_sql = $pdo->insert($create_sql);

$get_id_sql = 'SELECT id FROM users WHERE email = "' . $email . '";';
$user_id = $pdo->select($get_id_sql)[0]['id'];

if ($execute_sql) {
    $_SESSION['current_user'] = $user_id;
    header('Location: /user');
    exit();
} else {
    echo 'false';
}
