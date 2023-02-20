<?php

	//grabbing the data
	$user = $_POST["username"];
	$email = $_POST["email"];
	$pass = $_POST["password"];
	
	
	//instatiate RegisterControl class
	include "connect-db.php";
	include "register-db.php";
	include "register-classes.php";
	
	$database = new DataBase();
	$databaseConnect = $database->connectDB();
	$registerOrdersToDB = new RegisterOrdersToDB($databaseConnect);
	$registerControl = new RegisterControl($user, $email, $pass, $registerOrdersToDB);
	

	$registerControl -> registerUser();
	
	//header to next page
	//header ("location: ../login.html");


?>