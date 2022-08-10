<?php
include 'partial/head.php';
include 'db.php';

$pdo = new ConnectDB();

$sql = 'SELECT * FROM articles WHERE user_id = "' . $_SESSION['current_user'] . '";';
$contents = $pdo->execute($sql);
?>
<div class="container">
    <h1>Articles</h1>
    <div class="row">
        <?php foreach ($contents as $content) { ?>
            <h2><?php echo $content['title']; ?></h2>
            <p><?php echo $content['created_at']; ?></p>
            <p><?php echo $content['content']; ?></p>
        <?php } ?>
    </div>
</div>
<?php include 'partial/footer.php';
