<?php
  $userID = $_POST['userID'];
  $userPwd = $_POST['userPwd'];

  require_once "config.php";

  if(!$link){
    die("Could not connect: " . mysqli_connect_error($link));
  }
  else{
    $queryCheck = "select * from user
                    where userID = '".$userID."'";

    $resultCheck = mysqli_query($link,$queryCheck);

    if(mysqli_num_rows($resultCheck) == 0){
      session_start();
      $_SESSION["loginerror"] = 1; //user not exist
      header("Location:login.php");
    }
    else{
      $row = mysqli_fetch_array($resultCheck,MYSQLI_BOTH);

      if($row["userPwd"] == $userPwd){
        session_start(); //SUCCESS LOGIN

        $_SESSION["UID"] = $userID;
        $_SESSION["UType"] = $row["userType"];


        if(empty($_SESSION['prevPage'])){
          
        }
        elseif($_SESSION['prevPage'] == "index"){
          unset($_SESSION['prevPage']);
          header("Location:index.php");
        }
        elseif($_SESSION['prevPage'] == "register"){
          unset($_SESSION['prevPage']);
          header("Location:register.php");
        }
        elseif($_SESSION['prevPage'] == "view"){
          unset($_SESSION['prevPage']);
          header("Location:view.php");
        }
        elseif($_SESSION['prevPage'] == "admin"){
          unset($_SESSION['prevPage']);
          header("Location:admin.php");
        }
        else{
          header("Location:index.php");
        }

        
      }
      else{
        session_start();
        $_SESSION["loginerror"] = 2; //wrong password
        header("Location:login.php");
      }
    }
  }
  mysqli_close($link);
?>