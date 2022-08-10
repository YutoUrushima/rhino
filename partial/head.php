<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Rhino</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<header class="d-flex justify-content-around d-flex align-items-center bg-light">
    <h1 class="p-3">Rhino</h1>
    <nav>
        <ul class="list-unstyled">
            <li><a href="/user">user</a></li>
            <li><?php echo isset($_SESSION['current_user']) ? 'id: ' . $_SESSION['current_user'] : ''; ?></li>
        </ul>
    </nav>
    <div>
        <a class="btn btn-primary" href="/logout" role="button">Log out</a>
    </div>
</header>
