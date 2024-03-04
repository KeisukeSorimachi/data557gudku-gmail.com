<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- //BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- //FONTAWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>REGISTER</title>
</head>
<body class="bg-light">
  <div style="height: 100vh">
      <div class="row h-100 m-0">
        <div class="card w-25 my-auto mx-auto">
          <div class="card-header bg-white border-0 py-3">
            <h1 class="text-center">REGISTER</h1>
          </div>
          <div class="card-body">
            <form action="../actions/register.php" method="post">
              <div class="mb-3">
                <label for="first-name" class="form-label">First Name</label>
                <input type="text" name="first_name" id="first-name" class="form-control" required>
              </div>

              <div class="mb-3">
                <label for="last-name" class="form-label">Last Name</label>
                <input type="text" name="last_name" id="last-name" class="form-control" required>
              </div>

              <!--BOLD to add emphasis -->
              <div class="mb-3">
                <label for="username" class="form-label fw-bold">Username</label>
                <input type="text" name="username" id="username" class="form-control" required>
              </div>

              <div class="mb-5">
                <label for="password" class="form-label fw-bold">Password</label>
                <input type="password" name="password" id="password" class="form-control" minlength="8" aria-describedby="password-info" required>
                  <div class="form-text mb-3" id="pass-info">Password Must be atleast 8 characters long.
                  </div>
              </div>
              
              <button type="submit" class="btn btn-success w-100">Register</button>
            </form>

            <p class="text-center mt-3 small">Registered already? <a href="../views">Log in.</a></p>
          </div>
        </div>
      </div>
  </div>
</body>
</html>