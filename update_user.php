<?PHP
$DBUserName = "app";
$DBPassword = "password";
$DBName = "phr_auth";
$DBHost = "localhost";

if(!isset($_GET['fname']) || !isset($_GET['lname']) || !isset($_GET['email']) || !isset($_GET['phone']) || !isset($_GET['region']) || !isset($_GET['province'])){
	die("Not Enough Information");
}
else{
	$fname = $_GET['fname'];
	$lname = $_GET['lname'];
	$email = $_GET['email'];
	$phone = $_GET['phone'];
	$region = $_GET['region'];
	$province = $_GET['province'];
	//check the username here for invalid chars die if fail.
}

$con = new mysqli($DBHost, $DBUserName, $DBPassword, $DBName);
if($con->connect_error){
	die("Connection error: " .  $con->connect_error);
}
$user_role="USER";
$stmt = $con->prepare("update users set fname=?, lname=?, email=?, phone=?, region=?, province=? where email=?");
$stmt->bind_param("ssssss", $fname, $lname, $email, $phone, $region, $province, $email);
if($stmt->execute()){
	echo "true";
}
else{
	echo "false";
	echo $stmt->error;
}
$con->close();
?>