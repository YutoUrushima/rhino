<?php
include_once __DIR__ . '/../lib/db.php';
include_once __DIR__ . '/../lib/session.php';

$pdo = new ConnectDB();
$session = new Session();

$email = htmlspecialchars($_POST['signin_id'], ENT_QUOTES, 'UTF-8');
$password = htmlspecialchars($_POST['signin_password'], ENT_QUOTES, 'UTF-8');

$sql = 'SELECT id, email, password_hash FROM users WHERE email = "' . $email . '";';
$user_info = $pdo->select($sql);

if (count($user_info) == 1) {
    if ($user_info[0]['password_hash'] == hash('sha256', $password)) {
        $session->create_current_user($user_info[0]['id']);
        header('Location: /user');
        exit();
    } else {
        echo 'false';
    }
}
