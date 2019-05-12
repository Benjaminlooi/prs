<?php
session_start();
require_once "config.php";

$petID = @$_POST['petID'];
if(!$petID){
  ?>
  <h3>You are unauthorized to view this page!</h3>
  <p>Click <a href="index.php">here</a> to return to the homepage.</p>
  <?php
}
else{
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
        <a class="nav-link nav-item" href="./index.php">Home</a>
        <a class="nav-link nav-item" href="./register.php">Register New Pet</a>
        <a class="nav-link nav-item" href="./view.php">Your Pets</a>
      </div>

      <!-- IF NOT LOGGED IN ================================= -->
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
                      <div style="opacity:0; display: block; width: 100%; color: white; line-height: 20%;">sssssssssssssssssssssssssssssss</div>
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
        <!-- IF LOGGED IN =============================================================== -->
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

    <?php
    if(!$link){
      die("Could not connect: " . mysqli_connect_error());
    }
    else{
      $queryGet = "SELECT * FROM pet
      WHERE petID = '".$petID."'";

      $resultGet = mysqli_query($link,$queryGet);

      if(!$resultGet){
        die("Invalid Query" . mysqli_error($link));
      }
      else{
        $row = mysqli_fetch_array($resultGet,MYSQLI_BOTH);

        $petID = $row['petID'];
        $petSpecies = $row['petSpecies'];
        $petGender = $row['petGender'];
        ?>
        <!-- IF LOGGED IN =============================================================== -->
        <div class="register-top-content bg-light">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-6">

                <form action="./edit_process.php" method="POST" class="">
                  <h1 class="mb-3">Modifying Pet Data</h1>

                  <div class="form-row">
                    <div class="form-group col">
                      <label for="inputPetName">Pet's Name</label>
                      <input type="text" name="PetName" class="form-control" id="inputPetName" maxlength=50 placeholder="Whisky" value="<?php echo $row['petName']; ?>" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="w-100 customForm">Pet's Gender</label>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="inputPetGender1" name="PetGender" class="custom-control-input" value="Male" <?php if($petGender == "Male") echo "checked"; ?>>
                      <label class="custom-control-label" for="inputPetGender1">Male</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="inputPetGender2" name="PetGender" class="custom-control-input" value="Female" <?php if($petGender == "Female") echo "checked"; ?>>
                      <label class="custom-control-label" for="inputPetGender2">Female</label>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col">
                      <label>Pet's Species</label>
                      <select name="PetSpecies" class="custom-select" required>
                        <option value="Not selected" <?php if($petSpecies == "Not selected") echo "selected"; ?>>Open this select menu</option>
                        <option value="Bird" <?php if($petSpecies == "Bird") echo "selected"; ?>>Bird</option>
                        <option value="Cat" <?php if($petSpecies == "Cat") echo "selected"; ?>>Cat</option>
                        <option value="Chicken" <?php if($petSpecies == "Chicken") echo "selected"; ?>>Chicken</option>
                        <option value="Dog" <?php if($petSpecies == "Dog") echo "selected"; ?>>Dog</option>
                        <option value="Duck" <?php if($petSpecies == "Duck") echo "selected"; ?>>Duck</option>
                        <option value="Ferret" <?php if($petSpecies == "Ferret") echo "selected"; ?>>Ferret</option>
                        <option value="Fish" <?php if($petSpecies == "Fish") echo "selected"; ?>>Fish</option>
                        <option value="Hamster" <?php if($petSpecies == "Hamster") echo "selected"; ?>>Hamster</option>
                        <option value="Horse" <?php if($petSpecies == "Horse") echo "selected"; ?>>Horse</option>
                        <option value="Monkey" <?php if($petSpecies == "Monkey") echo "selected"; ?>>Monkey</option>
                        <option value="Pig" <?php if($petSpecies == "Pig") echo "selected"; ?>>Pig</option>
                        <option value="Rabbit" <?php if($petSpecies == "Rabbit") echo "selected"; ?>>Rabbit</option>
                        <option value="Reptile" <?php if($petSpecies == "Reptile") echo "selected"; ?>>Reptile</option>
                        <option value="Turtle" <?php if($petSpecies == "Turtle") echo "selected"; ?>>Turtle</option>
                        <option value="Unicorn" <?php if($petSpecies == "Unicorn") echo "selected"; ?>>Unicorn</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col">
                      <label>Pet's Breed</label>
                      <input type="text" name="PetBreed" class="form-control" placeholder="Enter Pet's Breed" value="<?php echo $row['petBreed']; ?>" maxlength=50>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-7">
                      <label for="inputPetWeight">Pet's Weight</label>
                      <div class="input-group">
                        <input type="number" name="PetWeight" class="form-control" id="inputPetWeight" placeholder="Weight in KG" value="<?php if($row['petWeight'] == 0.00) echo ''; else echo $row['petWeight']; ?>" min=0.01 max=999.99  step="0.01">
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
                        <input type="text" id="date" class="custom-select" data-format="YYYY-MM-DD" data-template="D MMM YYYY" value="<?php echo $row['petAge']; ?>" name="PetBirthdayDay">
                      </div>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col">
                      <label for="inputPetColor">Pet's Color</label>
                      <input type="color" id="inputPetColor" name="PetColor" value="<?php echo $row['petColor']; ?>" class="customInputColor">
                    </div>
                  </div>

                  <input type="hidden" name="petID" value="<?php echo $petID; ?>">
                  <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                </form>

              </div>

            </div>
          </div>
        </div>
        <?php
      }
    }
    ?>

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
  <?php
}
?>