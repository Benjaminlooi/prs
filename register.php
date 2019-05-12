<?php
session_start();

if(!isset($_SESSION["UID"])){
  $_SESSION['prevPage'] = "register";
  header("Location: ./login.php");
}

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
<body class="bg-light">
  <nav class="navbar navbar-light navbar-expand fixed-top" role="navigation">
    <a class="navbar-brand" href="./index.php"><b>P</b>et <b>R</b>egistration <b>S</b>ystem</a>
    <div class="navbar-nav">
      <?php
      if(empty($_SESSION["UType"])){
        ?>
        <a class="nav-link nav-item" href="./index.php">Home</a>
        <?php
      }
      elseif($_SESSION["UType"] == "admin"){
        ?>
        <a class="nav-link nav-item" href="./index.php">Home</a>
        <?php
      }
      elseif($_SESSION["UType"] == "user"){
        ?>
        <a class="nav-link nav-item" href="./index.php">Home</a>
        <a class="nav-link nav-item active" href="./register.php">Register New Pet</a>
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
            <a class="dropdown-item" href="register.php">Register New Pet</a>
            <a class="dropdown-item" href="view.php">Your Pets</a>
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

  <div class="register-top-content bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-6">
          <form action="./register_process.php" method="POST" class="">
            <h1 class="mb-3">Register your pet</h1>

            <div class="form-row">
              <div class="form-group col">
                <label for="inputPetName">Pet's Name *</label>
                <input type="text" name="PetName" class="form-control" id="inputPetName" maxlength=50 placeholder="Whisky" required>
              </div>
            </div>

            <div class="form-group">
              <label class="w-100 customForm">Pet's Gender</label>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="inputPetGender1" name="PetGender" class="custom-control-input" value="Male">
                <label class="custom-control-label" for="inputPetGender1">Male</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="inputPetGender2" name="PetGender" class="custom-control-input" value="Female">
                <label class="custom-control-label" for="inputPetGender2">Female</label>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col">
                <label>Pet's Species</label>
                <select name="PetSpecies" class="custom-select">
                  <option value="Not selected" selected>-Open this select menu-</option>
                  <option value="Bird">Bird</option>
                  <option value="Cat">Cat</option>
                  <option value="Chicken">Chicken</option>
                  <option value="Dog">Dog</option>
                  <option value="Duck">Duck</option>
                  <option value="Ferret">Ferret</option>
                  <option value="Fish">Fish</option>
                  <option value="Hamster">Hamster</option>
                  <option value="Horse">Horse</option>
                  <option value="Monkey">Monkey</option>
                  <option value="Pig">Pig</option>
                  <option value="Rabbit">Rabbit</option>
                  <option value="Reptile">Reptile</option>
                  <option value="Turtle">Turtle</option>
                  <option value="Unicorn">Unicorn</option>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col">
                <label>Pet's Breed</label>
                <input type="text" name="PetBreed" class="form-control" placeholder="Enter Pet's Breed" maxlength=50>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-7">
                <label for="inputPetWeight">Pet's Weight</label>
                <div class="input-group">
                  <input type="number" name="PetWeight" class="form-control" id="inputPetWeight" placeholder="Weight in KG" min=0.01 max=999.99 step="0.01">
                  <div class="input-group-append">
                    <div class="input-group-text">KG</div>
                  </div>
                </div>
                <small class="text-muted form-text">
                  You may use a value with 2 decimals (ex: 30.98)
                </small>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col">
                <label>Pet's Birthday</label>
                <div class="input-group">
                  <input type="text" id="date" class="custom-select" data-format="YYYY-MM-DD" data-template="D MMM YYYY" name="PetBirthdayDay">
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col">
                <label for="inputPetColor">Pet's Color</label>
                <input type="color" id="inputPetColor" name="PetColor" class="customInputColor">
              </div>
            </div>
            <small class="form-text text-muted mb-3">
              fields marked with * are required
            </small>
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
          </form>

        </div>

      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="./js/jquery-3.3.1.min.js"></script>
  <script src="./js/popper.min.js"></script>
  <script src="./js/moment.js"></script> 
  <script src="./js/combodate.js"></script> 
  <script src="./js/bootstrap.min.js"></script>
  <script id="js-date">
    $(function(){
      $('#date').combodate();
    });
  </script>
</body>
</html>