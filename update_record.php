<?PHP
$DBUserName = "sharm12f_app";
$DBPassword = "password";
$DBName = "sharm12f_PHRAUTH";
$DBHost = "localhost";


if(!isset($_GET['name']) || !isset($_GET['description']) || !isset($_GET['rid'])){
	die("error");
}
else{
	$name = $_GET['name'];
	$description = $_GET['description'];
	$rid = $_GET['rid'];
	//check the username here for invalid chars die if fail.
	$invalid_chars = '/[^A-Z a-z0-9.@#\\-$]/';
	if(preg_match($invalid_chars,$name) || preg_match($invalid_chars,$description) || preg_match($invalid_chars,$rid)){
		die("error");
	}
}

$con = new mysqli($DBHost, $DBUserName, $DBPassword, $DBName);
if($con->connect_error){
	die("error");
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