<?php
session_start();

require '../classes/Product.php';

$products = new Product;
$product_list = $products->getAllProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- //BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- //FONTAWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Dashboard</title>
</head>
<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark" style="margin-bottom: 80px;">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3">Sales OOP</h1>
            </a>
            <div class="navbar-nav">
                <span class="navbar-text"><?= $_SESSION['full_name'] ?></span>
                <form action="../actions/logout.php" method="post" class="d-flex ms-2">
                    <button type="submit" class="text-danger bg-transparent border-0">Log out</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="container">
    <div class="row mb-4">
      <div class="col">
        <h2 class="fw-light">Products</h2>
      </div>
      <div class="col text-end">
      <!-- //VS Code shortcut for adding button: a.btn.btn-success>i.fa-solid.fa-plus-circle -->
        <a href="add-product.php" class="btn btn-success"><i class="fa-solid fa-plus-circle"></i> Add Product</a>
      </div>
    </div>
    <table class="table table-hover align-middle border">
      <thead class="small table-success">
          <th>ID</th>
          <th style="width: 250px">product name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th></th>
          <th></th>
      </thead>
      <tbody>
              <?php 
                foreach($product_list as $product){
              ?>
          <tr>
              
            
                <td><?= $product['id'] ?></td>
                <td><?= $product['product_name'] ?></td>
                <td><?= $product['price'] ?></td>
                <td><?= $product['quantity'] ?></td>
                <td>
                    <!-- below for to go to page -->
                    <a href="edit-product.php?id=<?= $product['id']?>" 
                    class="btn btn-outline-secondary btn-sm" title= "Edit">
                      <i class="fa-solid fa-pencil-alt"></i>  
                    </a>
                    <!-- below to go to actions folder -->
                    <a href="../views/delete-product.php?id=<?= $product['id']?>" 
                    class="btn btn-outline-danger btn-sm" title="Delete">
                      <i class="fa-solid fa-trash-can"></i>  
                    </a>
                </td>
          </tr>
       <?php
          }
        ?>
      </tbody>
    </table>
  </main>
</body>
</html>

<!--
          1. Dashboard -> click the delete button
          2. actions/fetch_delete_item.php -> classes/ -> getspecificdeleteitem()
          3. delete-product.php -> getspecificdeleteitem (return the name); 



  -->
