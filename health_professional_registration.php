<?PHP
$DBUserName = "sharm12f_app";
$DBPassword = "password";
$DBName = "sharm12f_PHRAUTH";
$DBHost = "localhost";


if(!isset(!isset($_GET['name']) || !isset($_GET['email']) || !isset($_GET['phone']) || !isset($_GET['password']) || !isset($_GET['region']) || !isset($_GET['organization']) || !isset($_GET['department']) || !isset($_GET['health_professional'])){
	die("Not Enough Information");
}
else{
	$name = $_GET['name'];
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
$stmt = $con->prepare("INSERT INTO HEALTH_PROFESSIONAL_USER (NAME, EMAIL, PASSWORD, USER_ROLE, PHONE, REGION, ORGANIZATION, DEPARTMENT, HEALTH_PROFESSIONAL) VALUES (?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("sssssssss", $name, $email, $password, $user_role, $phone, $region, $organization, $department, $health_professional);
if($stmt->execute()){
	echo "true";
}
else{
	echo "false";
	echo $stmt->error;
}
$con->close();
?>