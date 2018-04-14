<?PHP
$DBUserName = "sharm12f_app";
$DBPassword = "password";
$DBName = "sharm12f_PHRAUTH";
$DBHost = "localhost";


if(!isset($_POST['id']) || !isset($_POST['login'])){
	die("error one");
}
else{
	$id = $_POST['id'];
	$login = $_POST['login'];
	//check the username here for invalid chars die if fail.
	if($id < 0){
		die("error");
	}
}

$con = new mysqli($DBHost, $DBUserName, $DBPassword, $DBName);
if($con->connect_error){
	die("error two");
}

$stmt = $con->prepare("UPDATE HEALTH_PROFESSIONAL_USER SET LOGOUT=? WHERE ID=?");
$stmt->bind_param("si",$login, $id);
$stmt->execute();

if($con->affected_rows == 1){
	echo "true";
}
else{
	echo "false";
}
$con->close();
?>

