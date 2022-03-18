<?php

$db = [
    'host' => 'localhost',
    'user' => 'i98795_db',
    'pass' => 'aj71j1ppnwzm0m44sf',
    'db' => 'i98795_db'
];

$dsn = "mysql:host={$db['host']};dbname={$db['db']};charset=utf8";
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

$pdo = new PDO($dsn, $db['user'], $db['pass'], $opt);

function get_chat_id($chat_id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM chat WHERE users_id = ?");
    $stmt->execute([$chat_id]);
    return $stmt->fetch();
}