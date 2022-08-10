<?php
include 'partial/head.php';
include 'lib/db.php';

$pdo = new ConnectDB();

$sql = 'SELECT * FROM articles WHERE user_id = "' . $_SESSION['current_user'] . '";';
$contents = $pdo->select($sql);
?>
    <h1 class="border-bottom pb-2">Articles</h1>
    <div class="row mb-5">
        <?php foreach ($contents as $content) { ?>
            <article class="border-bottom py-3 d-flex justify-content-between align-items-center">
                <div class="rhino-left">
                    <div class="d-flex d-flex align-items-baseline">
                        <h2 class="me-4"><?php echo $content['title']; ?></h2>
                        <time><?php echo $content['created_at']; ?></time>
                    </div>
                    <div>
                        <p><?php echo $content['content']; ?></p>
                    </div>
                </div>
                <div class="rhino-right">
                    <a class="btn btn-primary" href="/edit?id=<?php echo $content['id']; ?>" role="button">Edit</a>
                </div>
            </article>
        <?php } ?>
    </div>
    <a class="btn btn-primary" href="/article" role="button">Add Article</a>
<?php include 'partial/footer.php';
