<?php
include 'DBConnector.php';

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$msg = $_POST["msg"];

$sql = "INSERT INTO `contact_form` (`subject`, `message`) VALUES ('$subject', '$msg')";	//inserts into the contact_form table
$result = $conn -> query($sql);

if($result){
	$last_ticket= $conn -> insert_id;		//retrieves the ID of the newly inserted row
	$sql_person = "INSERT INTO `persons` (`email`, `name`,`ticket`) VALUES ('$email', '$name','$last_ticket')";	//inserts into the persons table
	$conn -> query($sql_person);
	}

$conn -> close();
?>