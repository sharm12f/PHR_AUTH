<?PHP
$DBUserName = "sharm12f_app";
$DBPassword = "password";
$DBName = "sharm12f_PHRAUTH";
$DBHost = "localhost";

if(!isset($_POST['email'])){
	die("error");
}
else{
	$email = $_POST['email'];
	//check the username here for invalid chars die if fail.
	$invalid_chars = '/[^A-Z a-z0-9.@#\\-$]/';
	if(preg_match($invalid_chars,$email)){
		die("error");
	}
}

$con = new mysqli($DBHost, $DBUserName, $DBPassword, $DBName);
if($con->connect_error){
	die("error");
}
$stmt = $con->prepare("SELECT COUNT(EMAIL) FROM HEALTH_PROFESSIONAL_USER WHERE EMAIL=?");
$stmt->bind_param("s",$email);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
if($count==1){
	echo "true";
}
$con->close();
?>
