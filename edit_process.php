<?php
session_start();
require_once "config.php";

$petID = $_POST["petID"];
$petName = $_POST["PetName"];
$petAge = $_POST["PetBirthdayDay"];
$petSpecies = $_POST["PetSpecies"];
$petGender = $_POST["PetGender"];
$petWeight = $_POST["PetWeight"];
$petBreed = $_POST["PetBreed"];
$petColor = $_POST["PetColor"];

if(!$link){
  die("Could not connect: " . mysqli_connect_error());
}
else{
  $queryInsert = "UPDATE pet
                  SET petName = '".$petName."',
                      petAge = '".$petAge."',
                      petSpecies = '".$petSpecies."',
                      petGender = '".$petGender."',
                      petWeight = '".$petWeight."',
                      petBreed = '".$petBreed."',
                      petColor = '".$petColor."'
                  WHERE petID = '".$petID."'";

  $resultInsert = mysqli_query($link,$queryInsert);

  if(!$resultInsert){
    die("Invalid query: " . mysqli_error($link));
  }
  else{
    //SUCCESSFULL RECORD UPDATE
    $_SESSION["update_status"] = 1;
    header("Location: view.php");
  }
}
?>