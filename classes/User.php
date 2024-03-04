<?php 
require 'Database.php';

class User extends Database //don't need db Connect
{
    public function store($request) {
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $username = $request['username'];
        $password = $request['password'];

        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (`first_name`,`last_name`,`username`,`password`)
                VALUES ('$first_name','$last_name','$username','$password')";

        if($this->conn->query($sql)){
          header('location:../views'); //go to the index.php
          exit;
        } else{
            die('Error creating the user:' . $this->conn->error);
        }
    }

    public function login($request)
    {
      $username = $request['username'];
      $password = $request['password'];

      $sql = "SELECT * FROM users WHERE username = '$username'";

      $result = $this->conn->query($sql);

      #Check the username
      if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        #Check if the password is correct
        if(password_verify($password, $user['password'])){
          #Create session variables for future use.
          session_start();
          $_SESSION['id'] = $user['id'];
          $_SESSION['username'] = $user['username'];
          $_SESSION['full_name'] = $user['first_name']. "" . $user['last_name'];

          header('location: ../views/dashboard.php');
          exit;
        } else {
          die ('Passwiord is incorrect.');
        }
      } else {
        die ('Username not found.');
      }
    }

    public function logout()
    {
      session_start();
      session_unset();
      session_destroy();

      header('location: ../views'); #this goes to the login page
      exit;
    }

    public function getAllProducts()
    {
      $sql = "SELECT id, product_name, price, quantity FROM Products";

      if($result = $this->conn->query($sql)){
        return $result;
      } else {
        die('Error retrieving all users: ' .$this->conn->error);
      }
    }

    public function getProducts()
    {
      $id = $_SESSION['id'];

      $sql = "SELECT product_name, price, quantity
              FROM Products
              WHERE id=$id";

      if($result = $this->conn->query($sql)){
        return $result->fetch_assoc();
      } else {
        die ('Error retrieving the user:' . $this->conn->error);
      }
    }

    public function update($request, $files)
    {
      session_start();
      $id = $_SESSION['id'];
      $product_name = $request['product_name'];
      $price = $request['price'];
      $quantity = $request['quantity'];

      $sql = "UPDATE Products
              SET  product_name = '$product_name',
                   price = '$price',
                   quantity = '$quantity'
              WHERE id=$id";

      if($this->conn->query($sql)){
        $_SESSION['product_name'] = $product_name;
        $_SESSION['price'] = $price;
        
        header('location: ../views/dashboard.php');
        exit;
      } else {
        die ('Error updating the product;' .$this->conn->error);
      }
    }

    // public function delete()
    // {
    //     session_start();
    //     $id = $_SESSION['id'];
    //     $sql = "DELETE FROM users WHERE id = $id";

    //     if ($this->conn->query($sql)) {
    //         $this->logout();
    //     } else {
    //         die('Error deleting your account;' .$this->conn->error);
    //     }
    // }
}
?>