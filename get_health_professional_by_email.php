<?PHP
$DBUserName = "sharm12f_app";
$DBPassword = "password";
$DBName = "sharm12f_PHRAUTH";
$DBHost = "localhost";

<<<<<<< HEAD

if(!isset($_GET['email'])){
	die("No email");
}
else{
	$email = $_GET['email'];

	//check the username here for invalid chars die if fail.
=======
if(!isset($_GET['email'])){
	die("error");
}
else{
	$email = $_GET['email'];
	
	//check the username here for invalid chars die if fail.
	$invalid_chars = '/[^A-Z a-z0-9.@#\\-$]/';
	if(preg_match($invalid_chars,$email)){
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

$stmt = $con->prepare("SELECT ID, EMAIL, CREATE_TIME, USER_ROLE, NAME, PHONE, REGION, ORGANIZATION, DEPARTMENT, HEALTH_PROFESSIONAL FROM HEALTH_PROFESSIONAL_USER WHERE EMAIL=?");
$stmt->bind_param("s",$email);
$stmt->execute();
$stmt->bind_result($dbid, $dbemail, $dbcreate_time, $dbuser_role, $db_name, $db_phone, $db_region, $db_organization, $db_department, $db_health);
$count = 0;
while($stmt->fetch()){
	$count=$count+1;
}
if($count!=1){
	$con->close();
<<<<<<< HEAD
	die ("Too many with same email");
=======
	die("error what");
>>>>>>> master
}

$user = array('id'=>$dbid, 'email'=>$dbemail, 'create_time'=>$dbcreate_time, 'user_role'=>$dbuser_role, 'name'=>$db_name, 'phone'=>$db_phone, 'region'=>$db_region, 'organization'=>$db_organization, 'department'=>$db_department, 'health_professional'=>$db_health);

$JSONUser = json_encode($user);

$con->close();

<<<<<<< HEAD
echo $JSONUser
=======
echo $JSONUser;
>>>>>>> master
?>