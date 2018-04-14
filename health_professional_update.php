<?PHP
$DBUserName = "sharm12f_app";
$DBPassword = "password";
$DBName = "sharm12f_PHRAUTH";
$DBHost = "localhost";

if(!isset($_POST['name']) || !isset($_POST['email']) || !isset($_POST['phone']) || !isset($_POST['id']) || !isset($_POST['region']) || !isset($_POST['province']) || !isset($_POST['organization']) || !isset($_POST['department']) || !isset($_POST['health_professional'])){
	die("error");
}
else{
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$region = $_POST['region'];
	$province = $_POST['province'];
	$organization = $_POST['organization'];
	$department = $_POST['department'];
	$health_professional = $_POST['health_professional'];
	//check the username here for invalid chars die if fail.
	$invalid_chars = '/[^A-Z a-z0-9.@#\\-$]/';
	if(preg_match($invalid_chars,$name) || preg_match($invalid_chars,$email) || preg_match($invalid_chars,$phone) ||  preg_match($invalid_chars,$region) || preg_match($invalid_chars,$province) || preg_match($invalid_chars,$organization) || preg_match($invalid_chars,$department) || preg_match($invalid_chars,$health_professional) || $id < 0){
		 die("error");
	}
}

$con = new mysqli($DBHost, $DBUserName, $DBPassword, $DBName);
if($con->connect_error){
	die("error");
}
$user_role="USER";
$stmt = $con->prepare("UPDATE HEALTH_PROFESSIONAL_USER SET NAME=?, EMAIL=?, PHONE=?, REGION=?, PROVINCE=?, ORGANIZATION=?, DEPARTMENT=?, HEALTH_PROFESSIONAL=? WHERE ID=?");
$stmt->bind_param("ssssssssi", $name, $email, $phone, $region, $province, $organization, $department, $health_professional, $id);
if($stmt->execute()){
	echo "true";
}
else{
	echo "false";
	echo $stmt->error;
}
$con->close();
?>
