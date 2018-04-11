<?PHP
$DBUserName = "sharm12f_app";
$DBPassword = "password";
$DBName = "sharm12f_PHRAUTH";
$DBHost = "localhost";

// Sample Url: update_user.php?fname=test&lname=test&email=test@test.com&phone=1231231234&region=Windsor&province=Ontario

if(!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['phone']) || !isset($_POST['region']) || !isset($_POST['province']) || !isset($_POST['id'])){
	die("error 1");
}
else{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$region = $_POST['region'];
	$province = $_POST['province'];
	$id = $_POST['id'];
	//check the username here for invalid chars die if fail.
	$invalid_chars = '/[^A-Z a-z0-9.@#\\-$]/';
	if(preg_match($invalid_chars,$name) || preg_match($invalid_chars,$email) || preg_match($invalid_chars,$phone) || preg_match($invalid_chars,$region) || preg_match($invalid_chars,$province)){
		 die("error 2");
	}
}

$con = new mysqli($DBHost, $DBUserName, $DBPassword, $DBName);
if($con->connect_error){
	die("error 3");
}
$user_role="USER";
$stmt = $con->prepare("UPDATE USERS SET NAME=?, EMAIL=?, PHONE=?, REGION=?, PROVINCE=? WHERE ID=?");
$stmt->bind_param("ssssss", $name, $email, $phone, $region, $province, $id);
if($stmt->execute()){
	echo "true";
}
else{
	echo "false";
	echo $stmt->error;
}
$con->close();
?>
