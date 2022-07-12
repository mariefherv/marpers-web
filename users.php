<?php
include 'DBConnector.php';

$username = $_POST["username"];

$sql = "SELECT * FROM `user_list` WHERE  `username` = '$username'";
$result = $conn -> query($sql);


echo mysqli_num_rows($result);


$conn -> close();
?>