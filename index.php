<?php
session_start();

$_SESSION['prevPage'] = "index";
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
      <?php
      if(empty($_SESSION["UType"])){
        ?>
        <a class="nav-link nav-item active" href="./index.php">Home</a>
        <a class="nav-link nav-item" href="./register.php">Register New Pet</a>
        <a class="nav-link nav-item" href="./view.php">Your Pets</a>
        <?php
      }
      elseif($_SESSION["UType"] == "admin"){
        ?>
        <a class="nav-link nav-item active" href="./index.php">Home</a>
        <a class="nav-link nav-item" href="./admin.php">All Pets</a>
        <?php
      }
      elseif($_SESSION["UType"] == "user"){
        ?>
        <a class="nav-link nav-item active" href="./index.php">Home</a>
        <a class="nav-link nav-item" href="./register.php">Register New Pet</a>
        <a class="nav-link nav-item" href="./view.php">Your Pets</a>
        <?php
      }
      ?>
    </div>

    <!-- NAV RIGHT - IF NOT LOGGED IN -->
    <?php
    if(!isset($_SESSION["UID"])){
      ?>
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
                    <div style="opacity:0; display: block; width: 100%; color: white; line-height: 20%;">ssssssssssssssssssssssssssssss</div>
                  </div>
                </div>
              </div>

              <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form> <!-- end login form -->
          </div>
        </li>
      </ul>
      <?php
    }
    else{
      ?>
      <!-- NAV RIGHT- IF LOGGED IN -->
      <span class="navbar-text ml-auto">Hi,</span>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php
            echo $_SESSION["UID"];
            ?>
          </a>
          <div class="dropdown-menu userMenu" aria-labelledby="navbarDropdown">
            <?php
            if($_SESSION["UType"] == "admin"){
              ?>
              <a class="dropdown-item" href="admin.php">View All Pets</a>
              <?php
            }
            elseif($_SESSION["UType"] == "user"){
              ?>
              <a class="dropdown-item" href="register.php">Register New Pet</a>
              <a class="dropdown-item" href="view.php">Your Pets</a>
              <?php
            }
            ?>
            
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="./logout.php">Logout</a>
          </div>
        </li>
      </ul>
      <?php
    }
    ?>
  </nav>
  <!-- END NAV----------------------- -->

  <div id="carouselMain" class="intro carousel slide h-auto" data-ride="carousel">
    <div class="overlay">
      <h1>Pet Registration System</h1>
      <p class="lead">Happy Deepavali</p>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="./img/dogbanner.jpg" alt="firstslide">
      </div>
    </div>
  </div>

  <section class="team-section py-5">
    <div class="container">
      <div class="row mb-5">
        <div class="text-center mb-1 col-12">
          <h2>Meet Our Team</h2>
          <h6 class="text-underline-primary">The 3 wise men</h6>
        </div>
        <div class="col-4 p-5">
          <img src="./img/ben.jpg" alt="ben pic" class="img-fluid ">
          <h3 class="customH3">Benjamin</h3>
          <p>Human</p>
        </div>
        <div class="col-4 p-5">
          <img src="./img/max.png" alt="max pic" class="img-fluid">
          <h3 class="customH3">Max</h3>
          <p>Human</p>
        </div>
        <div class="col-4 p-5">
          <img src="./img/nigel.png" alt="nigel pic" class="img-fluid">
          <h3 class="customH3">Nigel</h3>
          <p>Human</p>
        </div>
      </div>
    </div>
  </section>

  <section>
    <footer class="text-light bg-dark">
      <div class="container">
        <p class="float-right">
          <a href="#" class="text-light">Back to top</a>
        </p>
        <p>PRS is &copy; The 3 wise man</p>
        <p>User accounts: (username:password)</p>
        <p>admin:321</p>
        <p>ben:123</p>
        <p>user:123</p>
      </div>
    </footer>
  </section>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="./js/jquery-3.3.1.min.js"></script>
  <script src="./js/popper.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
</body>
</html>