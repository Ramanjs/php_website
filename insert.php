<?php


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
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	 
	$stmt = $pdo->prepare("INSERT INTO STUDENTS (NAME, CLASS, SECTION) VALUES(:name, :class, :section);");
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

$pdo = null;

?>