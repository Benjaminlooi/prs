<?php
session_start();
require_once "config.php";

$petName = $_POST["petName"];

if(!$link){
  die("Could not connect: " . mysqli_connect_error());
}
else{
  if ($_POST['action'] == 'Approve') {
    $query = "UPDATE pet
              SET status = 'Approved'
              WHERE petName = '".$petName."'";

    $result = mysqli_query($link,$query);

    if(!$result){
      die("Invalid query: " . mysqli_error($link));
    }
    else{
      //SUCCESSFULL RECORD SET APPROVE
      $_SESSION["admin_status"] = 1;
      header("Location: admin.php");
    }
  }
  elseif($_POST['action'] == 'Incomplete'){
    $query = "UPDATE pet
              SET status = 'Incomplete'
              WHERE petName = '".$petName."'";

    $result = mysqli_query($link,$query);

    if(!$result){
      die("Invalid query: " . mysqli_error($link));
    }
    else{
      //SUCCESSFULL RECORD SET INCOMPLETE
      $_SESSION["admin_status"] = 2;
      header("Location: admin.php");
    }
  }
}
?>