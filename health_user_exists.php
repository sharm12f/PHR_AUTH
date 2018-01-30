<?PHP
$DBUserName = "app";
$DBPassword = "password";
$DBName = "phr_auth";
$DBHost = "localhost";

if(!isset($_GET['email'])){
	die("No email");
}
else{
	$email = $_GET['email'];
	//check the username here for invalid chars die if fail.
}

$con = new mysqli($DBHost, $DBUserName, $DBPassword, $DBName);
if($con->connect_error){
	die("Connection error: " .  $con->connect_error);
}

$stmt = $con->prepare("select count(email) from health_professional_user where email=?");
$stmt->bind_param("s",$email);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
if($count==1){
	echo "true";
}
$con->close();
?>