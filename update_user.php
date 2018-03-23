<?PHP
$DBUserName = "sharm12f_app";
$DBPassword = "password";
$DBName = "sharm12f_PHRAUTH";
$DBHost = "localhost";

// Sample Url: update_user.php?fname=test&lname=test&email=test@test.com&phone=1231231234&region=Windsor&province=Ontario

if(!isset($_GET['name']) || !isset($_GET['email']) || !isset($_GET['phone']) || !isset($_GET['region']) || !isset($_GET['province'])){
<<<<<<< HEAD
	die("Not Enough Information");
=======
	die("error 1");
>>>>>>> master
}
else{
	$name = $_GET['name'];
	$email = $_GET['email'];
	$phone = $_GET['phone'];
	$region = $_GET['region'];
	$province = $_GET['province'];
	//check the username here for invalid chars die if fail.
<<<<<<< HEAD
=======
	$invalid_chars = '/[^A-Z a-z0-9.@#\\-$]/';
	if(preg_match($invalid_chars,$name) || preg_match($invalid_chars,$email) || preg_match($invalid_chars,$phone) || preg_match($invalid_chars,$region) || preg_match($invalid_chars,$province)){
		 die("error 2");
	}
>>>>>>> master
}

$con = new mysqli($DBHost, $DBUserName, $DBPassword, $DBName);
if($con->connect_error){
<<<<<<< HEAD
	die("Connection error: " .  $con->connect_error);
=======
	die("error 3");
>>>>>>> master
}
$user_role="USER";
$stmt = $con->prepare("UPDATE USERS SET NAME=?, EMAIL=?, PHONE=?, REGION=?, PROVINCE=? WHERE EMAIL=?");
$stmt->bind_param("ssssss", $name, $email, $phone, $region, $province, $email);
if($stmt->execute()){
	echo "true";
}
else{
	echo "false";
	echo $stmt->error;
}
$con->close();
?>