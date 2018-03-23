<?PHP
$DBUserName = "sharm12f_app";
$DBPassword = "password";
$DBName = "sharm12f_PHRAUTH";
$DBHost = "localhost";

// Sample Url: user_exists.php?email=test@test.com

if(!isset($_GET['email'])){
<<<<<<< HEAD
	die("No email");
}
else{
	$email = $_GET['email'];
	//check the username here for invalid chars die if fail.
=======
	die("error");
}
else{
	$email = $_GET['email'];
	//check the username here for invalid chars die if fail.//check the username here for invalid chars die if fail.
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
=======
	die("error");
>>>>>>> master
}
$stmt = $con->prepare("SELECT COUNT(EMAIL) FROM USERS WHERE EMAIL=?");
$stmt->bind_param("s",$email);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
if($count==1){
	echo "true";
}
$con->close();

?>