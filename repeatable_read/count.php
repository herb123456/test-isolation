<?php
$conf = require "../db_config.php";
$db = new PDO('mysql:host='. $conf['host'] .';dbname='. $conf['dbname'] .';charset=utf8mb4', $conf['user'], $conf['password']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->query("SET SESSION TRANSACTION ISOLATION LEVEL REPEATABLE READ");

$db->beginTransaction();

$stmt = $db->query('SELECT COUNT(*) FROM products');
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//use $results
print_r($results);

sleep(5);

$stmt2 = $db->query('SELECT COUNT(*) FROM products');
$results2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

print_r($results2);

$db->commit();