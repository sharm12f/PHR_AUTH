<?PHP
$DBUserName = "sharm12f_app";
$DBPassword = "password";
$DBName = "sharm12f_PHRAUTH";
$DBHost = "localhost";


if(!isset($_GET['email'])){
	die("No email");
}
else{
	$email = $_GET['email'];

	//check the username here for invalid chars die if fail.
}

$con = new mysqli($DBHost, $DBUserName, $DBPassword, $DBName);
if($con->connect_error){
	die("Connection error: " .  $con->connect_error);
}

$stmt = $con->prepare("SELECT ID, EMAIL, CREATE_TIME, USER_ROLE, FNAME, LNAME, PHONE, REGION, PROVINCE FROM USERS WHERE EMAIL=?");
$stmt->bind_param("s",$email);
$stmt->execute();
$stmt->bind_result($dbid, $dbemail, $dbcreate_time, $dbuser_role, $db_fname, $db_lname, $db_phone, $db_region, $db_province);
$count = 0;
while($stmt->fetch()){
	$count=$count+1;
}
if($count!=1){
	$con->close();
	die ("Too many with same email");
}

$user = array('id'=>$dbid, 'email'=>$dbemail, 'create_time'=>$dbcreate_time, 'user_role'=>$dbuser_role, 'fname'=>$db_fname, 'lname'=>$db_lname, 'phone'=>$db_phone, 'region'=>$db_region, 'province'=>$db_province);

$JSONUser = json_encode($user);

$con->close();

echo $JSONUser
?>