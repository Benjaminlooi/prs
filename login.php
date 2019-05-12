<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="./css/bootstrap.css">
  <link rel="stylesheet" href="./css/all.css">
  
  <link rel="stylesheet" href="./css/style.css">

  <title>Pet Registration System</title>
</head>
<body>
  <nav class="navbar navbar-light navbar-expand fixed-top d-flex" role="navigation">
    <a class="navbar-brand" href="./index.php"><b>P</b>et <b>R</b>egistration <b>S</b>ystem</a>
    <div class="navbar-nav">
      <a class="nav-link nav-item" href="./index.php">Home</a>
      <a class="nav-link nav-item" href="./register.php">Register New Pet</a>
      <a class="nav-link nav-item" href="./view.php">Your Pets</a>
    </div>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-user"></i> Login</a>
        <div class="dropdown-menu userMenu" aria-labelledby="navbarDropdown">

          <!-- start login form -->
          <form action="./login_process.php" method="post" class="custom-dropdown-item login-form">

            <div class="form-row">
              <div class="form-group mb-2">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div>
                  <input type="text" name="userID" class="form-control" placeholder="Username" required>
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group mb-2">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                  </div>
                  <input type="password" name="userPwd" class="form-control" placeholder="Password" required>
                  <div style="opacity:0; display: block; width: 100%; color: white; line-height: 20%;">sssssssssssssssssssssssssssssss</div>
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </form> <!-- end login form -->
        </div>
      </li>
    </ul>
  </nav>
  <!-- END NAV----------------------- -->


  <div class="signin-form text-center">

    <?php
    if(empty($_SESSION['loginerror'])){
      ?>
      <form action="login_process.php" method="POST" class="form-signin">
        <?php
      }
      elseif($_SESSION['loginerror'] == 1 || $_SESSION['loginerror'] == 2){
        ?>
        <form action="./login_process.php" method="POST" class="form-signin was-validated">
          <?php
        }
        ?>

        <!-- DISPLAY ERROR MESSAGE IF ATTEMP TO VIEW REGISTER & VIEW PAGE -->
        <?php
        if(!isset($_SESSION['prevPage'])){
        }
        elseif($_SESSION['prevPage'] == "register"){
          ?>
          <div class="alert alert-danger" role="alert">
            You must be logged in first before registering a new pet
          </div>
          <?php
        }
        elseif($_SESSION['prevPage'] == "view"){
          ?>
          <div class="alert alert-danger" role="alert">
            You must be logged in first before you can view your pets
          </div>
          <?php
        }
        ?>
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-user"></i></span>
            </div>
            <input type="text" class="form-control" name="userID" placeholder="Username" size="200" autocomplete="off" required>
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-lock"></i></span>
            </div>
            <input type="password" class="form-control" name="userPwd" placeholder="Password" required>
          </div>
          <div class="invalid-feedback d-block">

            <?php
            if(empty($_SESSION['loginerror'])){
            }
            elseif($_SESSION['loginerror'] == 1){
              echo "No username found!";
            }
            elseif($_SESSION['loginerror'] == 2){
              echo "Incorrect Password!";
            }

            unset($_SESSION['loginerror']);
            ?>
          </div>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
      </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
  </body>
  </html>