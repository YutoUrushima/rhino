<?php
include_once __DIR__ . '/../lib/session.php';

$session = new Session();

if (isset($_SESSION['current_user'])) {
    $session->delete_current_user();
    header('Location: /');
} else {
    echo 'false';
}
