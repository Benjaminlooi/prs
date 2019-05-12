<?php
session_start();

if(!isset($_SESSION["UID"])){
  $_SESSION['prevPage'] = "view";
  header("Location: ./login.php");
}

$petNameSearch = @$_POST["PetNameSearch"];

$x = 1;
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
  <nav class="navbar navbar-light navbar-expand fixed-top d-flex" role="navigation">
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
        <a class="nav-link nav-item" href="./register.php">Register New Pet</a>
        <a class="nav-link nav-item active" href="./view.php">Your Pets</a>
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

  <?php
  require_once "config.php";

  if(!$link){
    die("Could not connect: " . mysqli_connect_error());
  }
  else{
    if(@$_POST["PetNameSearch"]){ //Check if there was search query posted
      $queryGet = "SELECT * FROM pet
      WHERE (`petName` LIKE '%".$petNameSearch."%') AND (userID = '".$_SESSION["UID"]."')";
    }
    else{//If they was no search query, Display View table
      $queryGet = "select * from pet
      where userID = '".$_SESSION["UID"]."'";
    }
    $resultGet = mysqli_query($link,$queryGet);

    if(!$resultGet){
      die("Invalid query: " . mysqli_error($link));
    }
    else{
      ?>
      <div class="view-top-content bg-light">
        <div class="container-fluid view-container">
          <div class="row justify-content-center">
            <div class="col-12">
              <?php
              if(empty($_SESSION['insert_status'])){
              }
              elseif($_SESSION["insert_status"] == 1){ 
                ?>
                <div class="alert alert-success" role="alert">
                  Record has been added into the database!
                </div>
                <?php
              }
              unset($_SESSION['insert_status']);

              if(empty($_SESSION['update_status'])){
              }
              elseif($_SESSION["update_status"] == 1){ 
                ?>
                <div class="alert alert-success" role="alert">
                  The record has been updated!
                </div>
                <?php
              }
              unset($_SESSION['update_status']);

              if(empty($_SESSION['delete_status'])){
              }
              elseif($_SESSION["delete_status"] == 1){ 
                ?>
                <div class="alert alert-success" role="alert">
                  The record has been deleted!
                </div>
                <?php
              }
              unset($_SESSION['delete_status']);
              ?>

              <!-- Start user pets table -->
              <?php
              if(@$_POST["PetNameSearch"]){
                ?>
                <h2 class="float-left">
                  Search Results for <small class="text-muted" style="font-size: 0.8em">"<?php echo $petNameSearch ?>"</small>
                </h2>
                <?php
              }
              else{
                ?>
                <h2 class="float-left">Your Pets</h2>
                <?php
              }
              ?>
              <form action="view.php" method="POST" class="form-inline float-right"> <!-- Search bar -->
                <input class="form-control mr-2" type="text" name="PetNameSearch" placeholder="Pet Name" maxlength="50" aria-label="Search">
                <input class="btn btn-secondary" type="submit" value="Search">
              </form>
              <table class="table table-striped table-bordered">
                <thead class="">
                  <tr>
                    <th scope="col">#</th>
                    <th style="white-space:nowrap;" scope="col">Pet Name</th>
                    <th style="white-space:nowrap;" scope="col">Pet Species</th>
                    <th style="white-space:nowrap;" scope="col">Pet Breed</th>
                    <th style="white-space:nowrap;" scope="col">Pet Birthday</th>
                    <th style="white-space:nowrap;" scope="col">Pet Gender  </th>
                    <th style="white-space:nowrap;" scope="col">Pet Weight</th>
                    <th style="white-space:nowrap;" scope="col">Pet Color</th>
                    <th scope="col">Status</th>
                    <th scope="col">Options</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  while($row=mysqli_fetch_array($resultGet,MYSQLI_BOTH)){
                    ?>
                    <tr>
                      <th scope="row">
                        <?php echo $x; $x++; ?>
                      </th>
                      <td><?php echo $row['petName'] ?></td>
                      <td><?php if($row['petSpecies'] == 'Not selected'){ echo "<p class=\"text-danger empty-warning\">Not selected</p>";} else{ echo $row['petSpecies']; } ?></td>
                      <td><?php if(!$row['petBreed']){ echo "<p class=\"text-danger empty-warning\">Not entered</p>";} else{ echo $row['petBreed']; } ?></td>
                      <td style="white-space:nowrap;"><?php if($row['petAge'] == '0000-00-00'){ echo "<p class=\"text-danger empty-warning\">Not entered</p>";} else{ echo $row['petAge']; } ?></td>
                      <td><?php if(!$row['petGender']){ echo "<p class=\"text-danger empty-warning\">Not entered</p>";} else{ echo $row['petGender']; } ?></td>
                      <td><?php if($row['petWeight'] == 0){ echo "<p class=\"text-danger empty-warning\">Not entered</p>";} else{ echo $row['petWeight'] . "Kg"; } ?></td>
                      <td>
                        <span style="vertical-align : middle; display: inline-block; width: 60%; height: 20px; background-color: <?php echo $row['petColor'] ?>" class="border"></span>
                      </td>
                      <?php
                      if($row['status'] == 'Pending'){
                        ?>
                        <td class="table-warning">
                          Pending
                        </td>
                        <?php
                      }
                      elseif($row['status'] == 'Incomplete'){
                        ?>
                        <td class="table-danger">
                          Incomplete
                        </td>
                        <?php
                      }
                      elseif($row['status'] == 'Approved'){
                        ?>
                        <td class="table-success">
                          Approved
                        </td>
                        <?php
                      }
                      ?>
                      <td class="text-center">
                        <button type="button" class="btn btn-secondary btn-sm view-custom-button" data-container="body" data-toggle="popover" data-placement="bottom" data-trigger="focus" data-content="<?php
                        if($row['status'] == 'Pending' || $row['status'] == 'Incomplete'){
                          ?>
                          <form  style='float:left; margin: 0 6px 8px 0' action='edit.php' method='POST'>
                            <input type='submit' name='action' value='Edit' class='btn btn-primary'>
                            <input type='hidden'name='petID' value='<?php echo $row['petID']; ?>'>
                          </form>
                          <form  style='float:right;' action='delete_process.php' method='POST'>
                            <input type='submit' name='action' value='Delete' class='btn btn-primary'>
                            <input type='hidden'name='petID' value='<?php echo $row['petID']; ?>'>
                          </form>
                          <?php
                        }
                        else{
                          echo "Aprroved data cannot be modified";
                        }
                        ?>" data-html="true">
                        <i class="fas fa-caret-square-down"></i>
                      </button>

                    </td>
                  </tr>
                  <?php
                }
                ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <?php
    }//!$resultGet
  }//!$link
  ?>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="./js/jquery-3.3.1.min.js"></script>
  <script src="./js/popper.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(function () {
      $('[data-toggle="popover"]').popover()
    })
    $('.popover-dismiss').popover({
      trigger: 'focus'
    })
  </script>
</body>
</html>