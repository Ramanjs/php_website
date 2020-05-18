<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<title></title>
</head>
<body>

<table>

	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Class</th>
		<th>Section</th>
	</tr>
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


// use database
$sql = "USE myDb;";
if($conn->query($sql) !== TRUE){
	echo "Error using database: ".$conn->error;
}
?>
<?php
//display database
function display(){
	$sql = "SELECT * FROM STUDENT;";
	$result = $GLOBALS['conn']->query($sql);
	
	while($row = $result->fetch_assoc()){
		echo "<tr> <td> ".$row['ID']."</td> <td> 
		".$row['NAME']." </td> <td> ".$row['CLASS']." </td> <td>  ".$row['SECTION']."</td> </tr>"; 
	}
}

display();
?>
</table>
</body>
</html>