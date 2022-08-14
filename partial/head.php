<?php
include_once __DIR__ . '/../lib/session.php';
$session = new Session();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Rhino</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
<body>
    <header class="d-flex justify-content-between d-flex align-items-center bg-light px-5">
        <div>
            <h1 class="p-3"><a href="/" class="text-decoration-none text-dark">Rhino</a></h1>
        </div>
        <div class="d-flex align-items-center">
            <?php if ($session->check_current_user()) { ?>
                <nav>
                    <ul class="list-unstyled d-flex fs-5 mb-0 ms-3">
                        <li class="me-2">
                            <a href="/user" class="btn btn-outline-primary"><?php echo $session->get_user_alias(); ?></a>
                        </li>
                    </ul>
                </nav>
            <?php } ?>
            <div class="ms-3">
                <?php if ($session->check_current_user()) { ?>
                    <a class="btn btn-primary" href="<?php __DIR__; ?>/system/logout" role="button">Log out</a>
                <?php } else { ?>
                    <a class="btn btn-primary" href="/signin" role="button">Sign in</a>
                <?php } ?>
            </div>
        </div>
    </header>
    <div class="container py-5">
