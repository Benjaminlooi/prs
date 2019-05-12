<?php
session_start();
require_once "config.php";

$petID = $_POST["petID"];

if(!$link){
  die("Could not connect: " . mysqli_connect_error());
}
else{
  $queryDelete = "DELETE FROM pet
                  WHERE petID = '".$petID."'";

  $resultDelete = mysqli_query($link,$queryDelete);

  if(!$resultDelete){
    die("Invalid query: " . mysqli_error($link));
  }
  else{
    //SUCCESSFULL RECORD DELETE
    $_SESSION["delete_status"] = 1;
    header("Location: view.php");
  }
}
?>