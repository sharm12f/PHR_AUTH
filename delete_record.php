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
	if($id < 0){
		die("error");	
	}	
}


$con = new mysqli($DBHost, $DBUserName, $DBPassword, $DBName);
if($con->connect_error){
	die("Connection error: " .  $con->connect_error);
}

$remove_from_perms = "DELETE FROM HEALTH_PROFESSIONAL_HAS_USER_HEALTH_RECORD WHERE USER_HEALTH_RECORD_ID = ?";
$remove_from_records = "DELETE FROM USER_HEALTH_RECORD WHERE ID = ?";


$stmt = $con->prepare($remove_from_perms);
$stmt->bind_param("i", $id);
$stmt->execute();

$stmt = $con->prepare($remove_from_records);
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