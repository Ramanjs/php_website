<?php
$servername = "localhost";
$username = "root";
$password = "";

//Create connection
$conn = new mysqli($servername, $username, $password);

//Check connection
if($conn->connect_error){
	die("Connection failed: ".$conn->connect_error);
}
// echo "Connected successfully <br>";

// use database
$sql = "USE myDb;";
if($conn->query($sql) !== TRUE){
	echo "Error creating database: ".$conn->error;
}

$name = $class = $section = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = test_input($_POST["name"]);
	$class = test_input($_POST["class"]);
	$section = test_input($_POST["section"]);
	 
	$sql = "INSERT INTO STUDENT (NAME,CLASS,SECTION) VALUES('$name', '$class', '$section');";
	
	if($conn->query($sql) === TRUE){
		echo "New record created <br>";
	}else{
		echo "error: ".$conn->error."<br>";
	}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>