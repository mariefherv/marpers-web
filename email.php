<?php
include 'DBConnector.php';

$email = $_POST["email"];

//checks if email already exists

$sql = "SELECT * FROM `user_list` WHERE  `email` = '$email'";
$result = $conn -> query($sql);

echo mysqli_num_rows($result);	//if it already exists return 1 row

$conn -> close();
?>