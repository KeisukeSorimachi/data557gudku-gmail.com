<?php
session_start();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>New Product</title>
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
        <div class="row justify-content-center">
            <div class="col-3">
                <h2 class="fw-light mb-3">New Product</h2>

                <form action="../actions/product-actions.php" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label small fw-bold">Product Name</label>
                        <input type="text" name="product_name" id="name" class="form-control" max="50" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label small fw-bold">Price</label>
                        <div class="input-group">
                            <div class="input-group-text">$</div>
                            <input type="number" name="price" id="price" class="form-control" step="any" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="quantity" class="form-label small fw-bold">Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" required>
                    </div>

                    <a href="product.php" class="btn btn-outline-success">Cancel</a>
                    <button type="submit" name="btn_add" class="btn btn-success fw-bold px-5">
                        <i class="fa-solid fa-plus"></i> Add
                    </button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>