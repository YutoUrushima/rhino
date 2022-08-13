<?php
include_once __DIR__ . '/partial/head.php';
include_once __DIR__ . '/lib/db.php';
include_once __DIR__ . '/lib/session.php';

$pdo = new ConnectDB();
$session = new Session();

$session->validate_current_user();

$sql = 'SELECT * FROM articles WHERE user_id = "' . $_SESSION['current_user'] . '";';
$contents = $pdo->select($sql);

$user_sql = 'SELECT api_key FROM users WHERE id = ' . $_SESSION['current_user'] . ';';
$user_apikey = $pdo->select($user_sql)[0]['api_key'];
?>
    <div class="mb-5">
        <h2>API Key</h2>
        <?php if (is_null($user_apikey)) { ?>
            <div class="mt-2">
                <a class="btn btn-primary" href="<?php __DIR__; ?>/system/apikey.php" role="button">Generate apikey</a>
            </div>
            <?php } else { ?>
                <input type="text" class="form-control p-3" value="<?php echo $user_apikey; ?>" disabled/>
        <?php } ?>
    </div>
    <h2 class="border-bottom pb-2">Articles</h2>
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
<?php include_once __DIR__ . '/partial/footer.php';
