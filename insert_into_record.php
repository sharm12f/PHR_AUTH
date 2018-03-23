<?PHP
$DBUserName = "sharm12f_app";
$DBPassword = "password";
$DBName = "sharm12f_PHRAUTH";
$DBHost = "localhost";

if(!isset($_GET['name']) || !isset($_GET['description']) || !isset($_GET['uid'])){
	die("error");
}
else{
	$name = $_GET['name'];
	$description = $_GET['description'];
	$uid = $_GET['uid'];
	//check the username here for invalid chars die if fail.
	$invalid_chars = '/[^A-Z a-z0-9.@#\\-$]/';
	if(preg_match($invalid_chars,$name) || preg_match($invalid_chars,$description) || preg_match($invalid_chars,$uid)){
		die("error");
	}
}

$con = new mysqli($DBHost, $DBUserName, $DBPassword, $DBName);
if($con->connect_error){
	die("error");
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