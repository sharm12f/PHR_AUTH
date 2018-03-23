<?PHP
$DBUserName = "sharm12f_app";
$DBPassword = "password";
$DBName = "sharm12f_PHRAUTH";
$DBHost = "localhost";


<<<<<<< HEAD
if(!isset($_POST['email']) || !isset($_POST['password'])){
	die("No email or password");
}
else{
	$email = $_POST['email'];
	$password = $_POST['password'];
	//check the username here for invalid chars die if fail.
=======
if(!isset($_GET['email']) || !isset($_GET['password'])){
	die("error");
}
else{
	$email = $_GET['email'];
	$password = $_GET['password'];
	//check the username here for invalid chars die if fail.
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

$stmt = $con->prepare("SELECT PASSWORD FROM USERS WHERE EMAIL=?");
$stmt->bind_param("s",$email);
$stmt->execute();
$stmt->bind_result($dbpassword);
$count = 0;
while($stmt->fetch()){
	$count=$count+1;
}
if($count!=1){
	$con->close();
<<<<<<< HEAD
	die ("Too many with same username");
=======
	die("error");
>>>>>>> master
}

if($password === $dbpassword){
	echo "true";
}
$con->close();
<<<<<<< HEAD
?>
=======
?>
>>>>>>> master
