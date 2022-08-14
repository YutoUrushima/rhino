<?php
include_once __DIR__ . '/../lib/db.php';
include_once __DIR__ . '/get_meta.php';

$pdo = new ConnectDB();
$meta = new GetMetadata(getallheaders());

$apikey = $meta->get_apikey();

$user_sql = 'SELECT id FROM users WHERE api_key = "' . $apikey . '";';
$user_id = $pdo->select($user_sql)[0]['id'];

if (is_null($user_id)) {
    return null;
}

$sql = 'SELECT * FROM articles WHERE user_id = ' . $user_id . ';';
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

header('Content-Type: application/json; charset=UTF-8');
print json_encode($data, JSON_PRETTY_PRINT);
