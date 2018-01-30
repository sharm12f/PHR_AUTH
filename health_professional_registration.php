<?PHP
$DBUserName = "app";
$DBPassword = "password";
$DBName = "phr_auth";
$DBHost = "localhost";

if(!isset($_GET['fname']) || !isset($_GET['lname']) || !isset($_GET['email']) || !isset($_GET['phone']) || !isset($_GET['password']) || !isset($_GET['region']) || !isset($_GET['organization']) || !isset($_GET['department']) || !isset($_GET['health_professional'])){
	die("Not Enough Information");
}
else{
	$fname = $_GET['fname'];
	$lname = $_GET['lname'];
	$email = $_GET['email'];
	$phone = $_GET['phone'];
	$password = $_GET['password'];
	$region = $_GET['region'];
	$organization = $_GET['organization'];
	$department = $_GET['department'];
	$health_professional = $_GET['health_professional'];
	//check the username here for invalid chars die if fail.
}

$con = new mysqli($DBHost, $DBUserName, $DBPassword, $DBName);
if($con->connect_error){
	die("Connection error: " .  $con->connect_error);
}
$user_role="HP";
$stmt = $con->prepare("insert into health_professional_user (fname, lname, email, password, user_role, phone, region, organization, department, health_professional) values (?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssssssssss", $fname, $lname, $email, $password, $user_role, $phone, $region, $organization, $department, $health_professional);
if($stmt->execute()){
	echo "true";
}
else{
	echo "false";
	echo $stmt->error;
}
$con->close();
?>