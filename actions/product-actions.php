<?php 
include "../classes/Product.php";

$products = new Product;

if(isset($_POST['btn_add'])){
  $products->addProduct($_POST);
} elseif (isset($_POST['btn_update'])){
  $product_id = $_GET['product_id'];
  $product_name = $_POST['product_name'];
  $product_price = $_POST['price'];
  $product_quantity = $_POST['quantity'];
  
  $products->editProduct($product_id, $product_name, $product_price,$product_quantity);
}
?>