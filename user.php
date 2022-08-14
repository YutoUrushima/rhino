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
        <h2>Your Name</h2>
        <form action="<?php __DIR__; ?>/system/update_name.php" method="post">
            <input type="text" class="form-control p-3" name="name" value="<?php echo $session->get_current_user_name(); ?>"/>
            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
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
                        <h3 class="me-4 fs-1"><?php echo $content['title']; ?></h3>
                        <time class="d-inline-flex mb-3 px-2 py-1 bg-success bg-opacity-10 border border-success border-opacity-10 rounded-2">
                            <span class="material-symbols-outlined">edit</span>
                            <?php echo $content['created_at']; ?>
                        </time>
                        <time class="d-inline-flex mb-3 px-2 py-1 bg-success bg-opacity-10 border border-success border-opacity-10 rounded-2 ms-3">
                            <span class="material-symbols-outlined">update</span>
                            <?php echo $content['updated_at']; ?>
                        </time>
                    </div>
                    <div>
                        <p class="fs-5"><?php echo $content['content']; ?></p>
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
