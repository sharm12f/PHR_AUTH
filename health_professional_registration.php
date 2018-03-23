<?PHP
$DBUserName = "sharm12f_app";
$DBPassword = "password";
$DBName = "sharm12f_PHRAUTH";
$DBHost = "localhost";


if(!isset(!isset($_GET['name']) || !isset($_GET['email']) || !isset($_GET['phone']) || !isset($_GET['password']) || !isset($_GET['region']) || !isset($_GET['organization']) || !isset($_GET['department']) || !isset($_GET['health_professional'])){
<<<<<<< HEAD
	die("Not Enough Information");
=======
	die("error");
>>>>>>> master
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
<<<<<<< HEAD
	//check the username here for invalid chars die if fail.
=======
	
	//check the username here for invalid chars die if fail.
	$invalid_chars = '/[^A-Z a-z0-9.@#\\-$]/';
	if(preg_match($invalid_chars,$name) || preg_match($invalid_chars,$email) || preg_match($invalid_chars,$phone) || preg_match($invalid_chars,$password) || preg_match($invalid_chars,$region) || preg_match($invalid_chars,$organization) || preg_match($invalid_chars,$department) || preg_match($invalid_chars,$health_professional)){
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