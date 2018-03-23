<?PHP
$DBUserName = "sharm12f_app";
$DBPassword = "password";
$DBName = "sharm12f_PHRAUTH";
$DBHost = "localhost";

<<<<<<< HEAD

if(!isset($_GET['email'])){
	die("No email");
=======
if(!isset($_GET['email'])){
	die("error");
>>>>>>> master
}
else{
	$email = $_GET['email'];
	//check the username here for invalid chars die if fail.
<<<<<<< HEAD
=======
	$invalid_chars = '/[^A-Z a-z0-9.@#\\-$]/';
	if(preg_match($invalid_chars,$email)){
		die("error");
	}
>>>>>>> master
}

$con = new mysqli($DBHost, $DBUserName, $DBPassword, $DBName);
if($con->connect_error){
<<<<<<< HEAD
	die("Connection error: " .  $con->connect_error);
}

=======
	die("error");
}
>>>>>>> master
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