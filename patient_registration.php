<?PHP
$DBUserName = "app";
$DBPassword = "password";
$DBName = "phr_auth";
$DBHost = "localhost";

if(!isset($_GET['name']) || !isset($_GET['email']) || !isset($_GET['phone']) || !isset($_GET['password'])){
	die("Not Enough Information");
}
else{
	$name = $_GET['name'];
	$email = $_GET['email'];
	$phone = $_GET['phone'];
	$password = $_GET['password'];

	//check the username here for invalid chars die if fail.
}

$con = new mysqli($DBHost, $DBUserName, $DBPassword, $DBName);
if($con->connect_error){
	die("Connection error: " .  $con->connect_error);
}
$user_role="USER";
$stmt = $con->prepare("insert into users (name, email, password, user_role, phone) values (?,?,?,?,?)");
$stmt->bind_param("sssss", $name, $email, $password, $user_role, $phone);
if($stmt->execute()){
	echo "true";
}
else{
	echo "false";
	echo $stmt->error;
}
$con->close();
?>