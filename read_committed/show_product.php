<?php
$conf = require "../db_config.php";
$db = new PDO('mysql:host='. $conf['host'] .';dbname='. $conf['dbname'] .';charset=utf8mb4', $conf['user'], $conf['password']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$id = $argv[1];

$stmt = $db->prepare('SELECT * FROM products where id = :ID');
$stmt->execute(["ID" => $id]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//use $results
print_r($results);

sleep(5);

$stmt2 = $db->prepare('SELECT * FROM products where id = :ID');
$stmt2->execute(["ID" => $id]);
$results2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

print_r($results2);