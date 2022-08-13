<?php
include __DIR__ . '/../lib/db.php';
include 'get_meta.php';

$pdo = new ConnectDB();
$meta = new GetMetadata(getallheaders());

$user_sql = 'SELECT id FROM users WHERE api_key = "96549948-f92e-4c73-bb92-395c378522d6";';
$user_id = $pdo->select($user_sql)[0]['id'];

$type = isset($_GET['type']) ? $_GET['type'] : 'all';
$sql = null;
if ($type == 'all') {
    $sql = 'SELECT * FROM articles WHERE user_id = ' . $user_id . ';';
}

$execute_sql = $pdo->select($sql);

$data = [];
foreach ($execute_sql as $record) {
    array_push($data, [
        'id' => $record['id'],
        'title' => $record['title'],
        'content' => $record['content'],
        'created_at' => $record['created_at'],
        'updated_at' => $record['updated_at'],
    ]);
}

header('Content-type: application/json');
echo json_encode($data);
return json_encode($data);
