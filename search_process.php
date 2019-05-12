<?php

$petName = $_POST['PetName'];

require_once "config.php";

if(!$link){
	die("Could not connect: " . mysqli_connect_error());
}
else{
	$queryGet = "SELECT * FROM pet
            	WHERE (`petName` LIKE '%".$petName."%') AND (`userID` == '".$_SESSION["UID"]."')
            	";

	$resultGet = mysqli_query($link, $queryGet);

	if(!$resultGet){
		die("Query error: " . mysqli_error($link));
	}
	else{
		while($row=mysqli_fetch_array($resultGet,MYSQLI_BOTH)){
			echo $row['petName'];
		}
	}
}
?>