<?php
include 'partial/head.php';
include 'db.php';

$pdo = new ConnectDB();

$sql = '
    SELECT * FROM users;
';

$result = $pdo->execute($sql);
?>
    <div class="container">
        <p><?php foreach ($result as $value) {
            echo $value['name'];
        } ?></p>
    </div>
<?php include 'partial/footer.php';
