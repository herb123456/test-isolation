<?php
// list_products.php
require_once "bootstrap.php";

$conn->beginTransaction();

$productRepository = $entityManager->getRepository('Product');
$products = $productRepository->findAll();

foreach ($products as $product) {
    /**
     * @var Product $product
     */
    echo sprintf("%s-%s\n", $product->getId(), $product->getName());
}

$conn->commit();