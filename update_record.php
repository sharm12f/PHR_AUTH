<?PHP
$DBUserName = "sharm12f_app";
$DBPassword = "password";
$DBName = "sharm12f_PHRAUTH";
$DBHost = "localhost";


if(!isset($_GET['name']) || !isset($_GET['description']) || !isset($_GET['rid'])){
	die("missing info");
}
else{
	$name = $_GET['name'];
	$description = $_GET['description'];
	$rid = $_GET['rid'];
	//check the username here for invalid chars die if fail.
}

$con = new mysqli($DBHost, $DBUserName, $DBPassword, $DBName);
if($con->connect_error){
	die("Connection error: " .  $con->connect_error);
}

$stmt = $con->prepare("UPDATE USER_HEALTH_RECORD SET NAME = ?, RECORD = ? WHERE ID = ?");
$stmt->bind_param("ssi",$name, $description, $rid);
if($stmt->execute()){
	echo "true";
}
else{
	echo "false";
	echo $stmt->error;
}
$con->close();
?>