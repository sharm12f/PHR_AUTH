<?PHP
$DBUserName = "sharm12f_app";
$DBPassword = "password";
$DBName = "sharm12f_PHRAUTH";
$DBHost = "localhost";

if(!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['phone']) || !isset($_POST['id']) || !isset($_POST['region'])){
	die("error");
}
else{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$id = $_POST['id'];
	$region = $_POST['region'];
	//check the username here for invalid chars die if fail.
	$invalid_chars = '/[^A-Z a-z0-9.@#\\-$]/';
	if(preg_match($invalid_chars,$name) || preg_match($invalid_chars,$email) || preg_match($invalid_chars,$phone) || preg_match($invalid_chars,$id) || preg_match($invalid_chars,$region)){
		 die("error");
	}
}

$con = new mysqli($DBHost, $DBUserName, $DBPassword, $DBName);
if($con->connect_error){
	die("error");
}
$user_role="USER";
$stmt = $con->prepare("UPDATE HEALTH_PROFESSIONAL_USER SET NAME=?, EMAIL=?, PHONE=?, REGION=? WHERE ID=?");
$stmt->bind_param("ssssi", $name, $email, $phone, $region, $id);
if($stmt->execute()){
	echo "true";
}
else{
	echo "false";
	echo $stmt->error;
}
$con->close();
?>
