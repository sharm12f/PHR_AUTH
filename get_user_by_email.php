<?PHP
$DBUserName = "sharm12f_app";
$DBPassword = "password";
$DBName = "sharm12f_PHRAUTH";
$DBHost = "localhost";


if(!isset($_POST['email'])){
	die("error");
}
else{
	$email = $_POST['email'];

	//check the username here for invalid chars die if fail.
	$invalid_chars = '/[^A-Z a-z0-9.@#\\-$]/';
	if(preg_match($invalid_chars,$email)){
		die("error");
	}
}

$con = new mysqli($DBHost, $DBUserName, $DBPassword, $DBName);
if($con->connect_error){
	die("error");
}

$stmt = $con->prepare("SELECT ID, EMAIL, CREATE_TIME, USER_ROLE, NAME, PHONE, REGION, PROVINCE, LOGIN FROM USERS WHERE EMAIL=?");
$stmt->bind_param("s",$email);
$stmt->execute();
$stmt->bind_result($dbid, $dbemail, $dbcreate_time, $dbuser_role, $db_name, $db_phone, $db_region, $db_province, $db_login);
$count = 0;
while($stmt->fetch()){
	$count=$count+1;
}
if($count!=1){
	$con->close();
	die("error");
}

$user = array('id'=>$dbid, 'email'=>$dbemail, 'create_time'=>$dbcreate_time, 'user_role'=>$dbuser_role, 'name'=>$db_name, 'phone'=>$db_phone, 'region'=>$db_region, 'province'=>$db_province, 'login'=>$db_login);

$JSONUser = json_encode($user);

$con->close();

echo $JSONUser
?>
