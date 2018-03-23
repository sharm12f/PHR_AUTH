<?PHP
$DBUserName = "sharm12f_app";
$DBPassword = "password";
$DBName = "sharm12f_PHRAUTH";
$DBHost = "localhost";


if(!isset($_GET['email']) || !isset($_GET['password'])){
<<<<<<< HEAD
	die("No email or password");
=======
	die("error");
>>>>>>> master
}
else{
	$email = $_GET['email'];
	$password = $_GET['password'];
	//check the username here for invalid chars die if fail.
<<<<<<< HEAD
=======
	$invalid_chars = '/[^A-Z a-z0-9.@#\\-$]/';
	if(preg_match($invalid_chars,$email) || preg_match($invalid_chars,$password)){
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

$stmt = $con->prepare("SELECT PASSWORD FROM HEALTH_PROFESSIONAL_USER WHERE EMAIL=?");
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