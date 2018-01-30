<?PHP
$DBUserName = "app";
$DBPassword = "password";
$DBName = "phr_auth";
$DBHost = "localhost";

if(!isset($_GET['email']) || !isset($_GET['password'])){
	die("No email or password");
}
else{
	$email = $_GET['email'];
	$password = $_GET['password'];
	//check the username here for invalid chars die if fail.
}

$con = new mysqli($DBHost, $DBUserName, $DBPassword, $DBName);
if($con->connect_error){
	die("Connection error: " .  $con->connect_error);
}

$stmt = $con->prepare("select password from health_professional_user where email=?");
$stmt->bind_param("s",$email);
$stmt->execute();
$stmt->bind_result($dbpassword);
$count = 0;
while($stmt->fetch()){
	$count=$count+1;
}
if($count!=1){
	$con->close();
	die ("Too many with same username");
}

if($password === $dbpassword){
	echo "true";
}
$con->close();
?>