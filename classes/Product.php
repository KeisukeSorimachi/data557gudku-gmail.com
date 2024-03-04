<?php 
require 'Database.php';

class Product extends Database //don't need db Connect
{
    public function addProduct($request) {
        // $id = $request['id'];
        $product_name = $request['product_name'];
        $price = $request['price'];
        $quantity = $request['quantity'];

        $sql = "INSERT INTO products (`product_name`, `price`, `quantity`)
                VALUES ('$product_name',$price,$quantity)";

        if($this->conn->query($sql)){
          header('location:../views/dashboard.php'); //go to the index.php
          exit;
        } else{
            die('Error creating the product:' . $this->conn->error);
        }
    }

    public function getAllProducts()
    {
      $sql = "SELECT * FROM products";

      if($result = $this->conn->query($sql)){
        while ($item = $result->fetch_assoc()){
          $items[] = $item;
        }
        return $items;
      } else {
        die('Error retrieving all products: ' .$this->conn->error);
      }
    }

    //this is the beginning of edit-product until going to the edit page
    public function getProduct($id)
    {
      // $id = $_SESSION['id'];

      $sql = "SELECT *
              FROM products
              WHERE id='$id'";

      if($result = $this->conn->query($sql)){
        return $result->fetch_assoc();
      } else {
        die ('Error retrieving the product:' . $this->conn->error);
      }
    }
    //
    public function editProduct($product_id,$product_name,$price,$quantity)
    {
      session_start();
      #initialize variable
      // $id = $_SESSION['id'];
      // $product_name = $request['product_name'];
      // $price = $request['price'];
      // $quantity = $request['quantity'];

      $sql = "UPDATE `products`
              SET  `product_name` = '$product_name',
                   `price` = $price,
                   `quantity` = $quantity   
              WHERE `id`=$product_id";

      if($this->conn->query($sql)){
        // $_SESSION['product_name'] = $product_name;
        // $_SESSION['price'] = $price;
        // $_SESSION['quantity'] = $quantity;
        
        header('location: ../views/dashboard.php');
        exit;
      } else {
        die ('Error updating the product;' .$this->conn->error);
      }
    }

    public function deleteProduct($id)
    {
        // session_start();
        // $id = $_SESSION['id'];

        $sql = "DELETE FROM products WHERE id = $id";

        if ($this->conn->query($sql)) {
          header ("location: ../views/dashboard.php");
          exit;
        } else {
          die ("Error deleting the product: " . $this->conn->error);
        }

    } 
    public function getSpecificDeleteItem($product_id)
    {
      $sql = "SELECT product_name FROM products WHERE id =$product_id";
      if($result = $this->conn->query($sql)){
        return $result->fetch_assoc();
      } else {
        die ('Error retrieving the product:' . $this->conn->error);
      }
    }
  } 
?>