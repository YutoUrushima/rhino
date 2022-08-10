<?php
include 'partial/head.php';
include 'lib/db.php';

if (!isset($_GET['id'])) {
    header('Location: /user');
}

$pdo = new ConnectDB();

$sql = 'SELECT * FROM articles WHERE id = "' . $_GET['id'] . '";';
$content = $pdo->select($sql);
?>
<div class="container">
    <h1>Edit Article</h1>
    <form action="<?php __DIR__; ?>/system/revision.php" method="post">
        <div class="mb-3">
            <label class="form-label" for="title">Title</label>
            <input class="form-control" type="text" name="title" id="title" value="<?php echo $content[0]['title']; ?>"/>
        </div>
        <div class="mb-3">
            <label class="form-label" for="content">Content</label>
            <textarea class="form-control" id="content" rows="3" name="content" type="text"><?php echo $content[0]['content']; ?></textarea>
        </div>
        <input type="hidden" name="article_id" value="<?php echo $_GET['id']; ?>">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php include 'partial/footer.php';
