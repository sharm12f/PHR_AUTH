<?PHP
$DBUserName = "sharm12f_app";
$DBPassword = "password";
$DBName = "sharm12f_PHRAUTH";
$DBHost = "localhost";

if(!isset($_GET['name']) || !isset($_GET['description']) || !isset($_GET['uid'])){
	die("missing info");
}
else{
	$name = $_GET['name'];
	$description = $_GET['description'];
	$uid = $_GET['uid'];
	//check the username here for invalid chars die if fail.
}

$con = new mysqli($DBHost, $DBUserName, $DBPassword, $DBName);
if($con->connect_error){
	die("Connection error: " .  $con->connect_error);
}

$stmt = $con->prepare("INSERT INTO USER_HEALTH_RECORD (NAME, RECORD, USER_ID) VALUES (?,?,?)");
$stmt->bind_param("ssi",$name, $description, $uid);
if($stmt->execute()){
	echo "true";
}
else{
	echo "false";
	echo $stmt->error;
}
$con->close();
?>