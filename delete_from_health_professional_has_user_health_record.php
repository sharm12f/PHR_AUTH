<?PHP
$DBUserName = "sharm12f_app";
$DBPassword = "password";
$DBName = "sharm12f_PHRAUTH";
$DBHost = "localhost";


if(!isset($_POST['id'])){
	die("error");
}
else{
	$id = $_POST['id'];
	
	//check the username here for invalid chars die if fail.
	$invalid_chars = '/[^A-Z a-z0-9.@#\\-$]/';
	if($id < 0){
		die("error");
	}
}

$con = new mysqli($DBHost, $DBUserName, $DBPassword, $DBName);
if($con->connect_error){
	die("Connection error: " .  $con->connect_error);
}

$stmt = $con->prepare("DELETE FROM HEALTH_PROFESSIONAL_HAS_USER_HEALTH_RECORD WHERE ID = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
if($con->affected_rows > 0){
	echo "true";
}
else{
	echo "false";
}
$con->close();

?>