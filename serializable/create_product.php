<?php
// create_product.php <name>
require_once "bootstrap.php";

$newProductName = $argv[1];

/**
 * @var \Doctrine\DBAL\Connection $conn
 */
$conn->beginTransaction();

$product = new Product();
$product->setName($newProductName);

$entityManager->persist($product);
$entityManager->flush();

$conn->commit();

echo "Created Product with ID " . $product->getId() . "\n";