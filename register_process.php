<?php
session_start();
require_once "config.php";

$petName = $_POST["PetName"];
$petAge = $_POST["PetBirthdayDay"];
$petSpecies = $_POST["PetSpecies"];
$petGender = $_POST["PetGender"];
$petWeight = $_POST["PetWeight"];
$petBreed = $_POST["PetBreed"];
$petColor = $_POST["PetColor"];

$queryInsert = "INSERT into pet
                VALUES(' ','".$petName."','".$petAge."','".$petSpecies."','".$petGender."','".$petWeight."','".$petBreed."','".$petColor."','".$_SESSION["UID"]."','Pending')";

$resultInsert = mysqli_query($link,$queryInsert);

if(!$resultInsert){
  die("Invalid query: ".mysqli_error($link));
}
else{
  //SUCCESSFULL RECORD INSERT
  $_SESSION["insert_status"] = 1;
  header("Location: view.php");
  // echo "Record has been added into the database";
}
?>
