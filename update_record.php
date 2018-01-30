<?PHP
$DBUserName = "app";
$DBPassword = "password";
$DBName = "phr_auth";
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

$stmt = $con->prepare("update user_health_record set name = ?, record = ? where id = ?");
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