<?php

try{
	//Create connection
	$db = parse_url(getenv("DATABASE_URL"));

	$pdo = new PDO("pgsql:" . sprintf(
	    "host=%s;port=%s;user=%s;password=%s;dbname=%s",
	    $db["host"],
	    $db["port"],
	    $db["user"],
	    $db["pass"],
	    ltrim($db["path"], "/")
	));
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		 
		$stmt = conn->prepare("INSERT INTO STUDENTS (NAME, CLASS, SECTION) VALUES(:name, :class, :section);");
		$stmt->bindParam(':name', $name);
 		$stmt->bindParam(':class', $class);
  		$stmt->bindParam(':section', $section);

  		$name = test_input($_POST["name"]);
		$class = test_input($_POST["class"]);
		$section = test_input($_POST["section"]);
		$stmt->execute();
		
		
		echo "New record created <br>";

	}

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}


}catch(PDOException $e){
	echo "connection error :" . $e->getMessage();
}
// //Check connection
// if($conn->connect_error){
// 	die("Connection failed: ".$conn->connect_error);
// }
// // echo "Connected successfully <br>";

// // use database
// $sql = "USE myDb;";
// if($conn->query($sql) !== TRUE){
// 	echo "Error creating database: ".$conn->error;
// }

// $name = $class = $section = "";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
// 	$name = test_input($_POST["name"]);
// 	$class = test_input($_POST["class"]);
// 	$section = test_input($_POST["section"]);
	 
// 	$sql = "INSERT INTO STUDENT (NAME,CLASS,SECTION) VALUES('$name', '$class', '$section');";
	
// 	if($conn->query($sql) === TRUE){
// 		echo "New record created <br>";
// 	}else{
// 		echo "error: ".$conn->error."<br>";
// 	}
// }
$conn = null;

?>