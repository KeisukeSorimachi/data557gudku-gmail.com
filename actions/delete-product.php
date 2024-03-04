<?php
session_start();
include "../classes/Product.php";

$product = new Product;

$product->deleteProduct($_GET['id']);

?>

