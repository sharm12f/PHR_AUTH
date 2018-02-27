<?PHP
$DBUserName = "sharm12f_app";
$DBPassword = "password";
$DBName = "sharm12f_PHRAUTH";
$DBHost = "localhost";

// Sample Url: update_user.php?fname=test&lname=test&email=test@test.com&phone=1231231234&region=Windsor&province=Ontario

if(!isset($_GET['name']) || !isset($_GET['email']) || !isset($_GET['phone']) || !isset($_GET['id'])){
	die("Not Enough Information");
}
else{
	$name = $_GET['name'];
	$email = $_GET['email'];
	$phone = $_GET['phone'];
	$id = $_GET['id'];
	//check the username here for invalid chars die if fail.
}

$con = new mysqli($DBHost, $DBUserName, $DBPassword, $DBName);
if($con->connect_error){
	die("Connection error: " .  $con->connect_error);
}
$user_role="USER";
$stmt = $con->prepare("UPDATE HEALTH_PROFESSIONAL_USER SET NAME=?, EMAIL=?, PHONE=? WHERE ID=?");
$stmt->bind_param("sssi", $name, $email, $phone, $id);
if($stmt->execute()){
	echo "true";
}
else{
	echo "false";
	echo $stmt->error;
}
$con->close();
?>