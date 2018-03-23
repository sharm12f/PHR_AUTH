<?PHP
$DBUserName = "sharm12f_app";
$DBPassword = "password";
$DBName = "sharm12f_PHRAUTH";
$DBHost = "localhost";

// Sample Url: patient_registration.php?fname=test&lname=test&email=test@test.com&phone=1231231234&password=password&region=Toronto&province=Ontario

if(!isset(!isset($_GET['name']) || !isset($_GET['email']) || !isset($_GET['phone']) || !isset($_GET['password']) || !isset($_GET['region']) || !isset($_GET['province'])){
	die("error");
}
else{
	$name = $_GET['name'];
	$email = $_GET['email'];
	$phone = $_GET['phone'];
	$password = $_GET['password'];
	$region = $_GET['region'];
	$province = $_GET['province'];
	//check the username here for invalid chars die if fail.
	$invalid_chars = '/[^A-Z a-z0-9.@#\\-$]/';
	if(preg_match($invalid_chars,$name) || preg_match($invalid_chars,$email) || preg_match($invalid_chars,$phone) || preg_match($invalid_chars,$password) || preg_match($invalid_chars,$region) || preg_match(province)){
		 die("error");
	}
}

$con = new mysqli($DBHost, $DBUserName, $DBPassword, $DBName);

if($con->connect_error){
	die("error");
}

$user_role='USER';
$stmt = $con->prepare("INSERT INTO USERS (NAME, EMAIL, PASSWORD, USER_ROLE, PHONE, REGION, PROVINCE) VALUES (?,?,?,?,?,?,?)");
$stmt->bind_param("sssssss", $name, $email, $password, $user_role, $phone, $region, $province);
if($stmt->execute()){
	echo "true";
}
else{
	echo "false";
	echo $stmt->error;
}
$con->close();
?>