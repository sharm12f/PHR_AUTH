<?PHP
$DBUserName = "sharm12f_app";
$DBPassword = "password";
$DBName = "sharm12f_PHRAUTH";
$DBHost = "localhost";

if(!isset($_POST['name']) || !isset($_POST['description']) || !isset($_POST['uid'])){
	die("error");
}
else{
	if(isset($_POST['filename'])){
		$filename = $_POST['filename'];
	}
	$name = $_POST['name'];
	$description = $_POST['description'];
	$uid = $_POST['uid'];
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

if(!isset($_POST['filename'])){
	$stmt = $con->prepare("INSERT INTO USER_HEALTH_RECORD (NAME, RECORD, USER_ID) VALUES (?,?,?)");
	$stmt->bind_param("ssi",$name, $description, $uid);
}
else{
	$stmt = $con->prepare("INSERT INTO USER_HEALTH_RECORD (NAME, RECORD, USER_ID, FILENAME) VALUES (?,?,?,?)");
	$stmt->bind_param("ssis",$name, $description, $uid, $filename);
}

if($stmt->execute()){
	echo "true";
}
else{
	echo "false";
	echo $stmt->error;
}
$con->close();
?>
