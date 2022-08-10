<?php
include 'db.php';

$pdo = new ConnectDB();
$email = htmlspecialchars($_POST['signup_id'], ENT_QUOTES, 'UTF-8');
$password = htmlspecialchars($_POST['signup_password'], ENT_QUOTES, 'UTF-8');

$sql = 'SELECT email, password_hash FROM users WHERE email = "' . $email . '";';
$user_info = $pdo->execute($sql);

if (count($user_info) == 1) {
    if ($user_info[0]['password_hash'] == hash('sha256', $password)) {
        echo 'success';
    } else {
        echo 'false';
    }
}
