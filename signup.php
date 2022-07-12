<?php
include 'DBConnector.php';

session_start();

$email = $_POST["email"];
$username = $_POST["usr"];
$password = $_POST["pw"];

//inserts into the user_list table
$hash = md5($password);	//encrypts password
$sql = "INSERT INTO `user_list` (`email`, `username`,`password`) VALUES ('$email','$username', '$hash')";	
$result = $conn -> query($sql);

$_SESSION["username"] = $username;		//starts session with new username

return($result);


$conn -> close();
?>