<?PHP
$DBUserName = "sharm12f_app";
$DBPassword = "password";
$DBName = "sharm12f_PHRAUTH";
$DBHost = "localhost";


if(!isset($_POST['hpid']) || !isset($_POST['rid'])){
	die("error");
}
else{
	$hpid = $_POST['hpid'];
	$rid = $_POST['rid'];
	
	//check the username here for invalid chars die if fail.
	$invalid_chars = '/[^A-Z a-z0-9.@#\\-$]/';
	if($hpid < 0 || $rid < 0){
		die("error");
	}
}

$con = new mysqli($DBHost, $DBUserName, $DBPassword, $DBName);
if($con->connect_error){
	die("Connection error: " .  $con->connect_error);
}

$stmt = $con->prepare("SELECT ID FROM HEALTH_PROFESSIONAL_HAS_USER_HEALTH_RECORD WHERE HEALTH_PROFESSIONAL_ID = ? AND USER_HEALTH_RECORD_ID = ?");
$stmt->bind_param("ii", $hpid, $rid);
$stmt->execute();
$count = 0;
while($stmt->fetch()){
	$count += 1;
}
if($count == 1){
	echo "true";
}
else{
	echo "false";
}
$con->close();

?>