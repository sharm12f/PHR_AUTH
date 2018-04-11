<?PHP
$DBUserName = "sharm12f_app";
$DBPassword = "password";
$DBName = "sharm12f_PHRAUTH";
$DBHost = "localhost";


$invalid_chars = '/[^A-Z a-z0-9.@#\\-$]/';
$invalid_chars_des = '/[^A-Z a-z0-9.@\\s\\S#\\-$]/';


if(!isset($_POST['name']) || !isset($_POST['description']) || !isset($_POST['user_id']) || !isset($_POST['health_professional_id'])){
	die("error one");
}
else{
	$name = $_POST['name'];
	$description = $_POST['description'];
	$uid = $_POST['user_id'];
	$hpid = $_POST['health_professional_id'];

	//check the username here for invalid chars die if fail.
	if(preg_match($invalid_chars,$name) || preg_match($invalid_chars_des,$description) || $uid < 0 || $hpid < 0){
		die("error");
	}
}

$con = new mysqli($DBHost, $DBUserName, $DBPassword, $DBName);
if($con->connect_error){
	die("error two");
}

$stmt = $con->prepare("INSERT INTO NOTES (USER_ID, HEALTH_PROFESSIONAL_ID, NAME, DESCRIPTION) VALUES (?,?,?,?)");
$stmt->bind_param("iiss",$uid, $hpid, $name, $description);
if($stmt->execute()){
	echo "true";
}
else{
	echo "false";
	echo $stmt->error;
}
$con->close();
?>
