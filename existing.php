<?php

session_start();

include 'DBConnector.php';

$username = $_POST["username"];
$password = $_POST["password"];

$hash = md5($password);	//encrypts password

$sql = "SELECT * FROM `user_list` WHERE  `username` = '$username' AND `password` = '$hash'";	//searches database for given username and password

$result = $conn -> query($sql);

echo mysqli_num_rows($result);			//returns number of rows

if(mysqli_num_rows($result)== 1){		//start session if there exists
	$_SESSION["username"] = $username;
}



$conn -> close();
?>