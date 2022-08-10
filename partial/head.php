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
            <ul class="list-unstyled d-flex fs-5">
                <li class="me-2"><a href="/user" class="text-decoration-none">user</a></li>
                <li><a href="/article" class="text-decoration-none">artilce</a></li>
            </ul>
        </nav>
        <div>
            <?php if (isset($_SESSION['current_user'])) { ?>
                <a class="btn btn-primary" href="<?php __DIR__; ?>/system/logout" role="button">Log out</a>
            <?php } else { ?>
                <a class="btn btn-primary" href="/signin" role="button">Sign in</a>
            <?php } ?>
        </div>
    </header>
    <div class="container py-3">
