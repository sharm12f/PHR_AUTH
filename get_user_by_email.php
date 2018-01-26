<?PHP
$DBUserName = "app";
$DBPassword = "password";
$DBName = "phr_auth";
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

$stmt = $con->prepare("select id, email, create_time, user_role, name, phone, region, province from users where email=?");
$stmt->bind_param("s",$email);
$stmt->execute();
$stmt->bind_result($dbid, $dbemail, $dbcreate_time, $dbuser_role, $db_name, $db_phone, $db_region, $db_province);
$count = 0;
while($stmt->fetch()){
	$count=$count+1;
}
if($count!=1){
	$con->close();
	die ("Too many with same email");
}

$user = array('id'=>$dbid, 'email'=>$dbemail, 'create_time'=>$dbcreate_time, 'user_role'=>$dbuser_role, 'name'=>$db_name, 'phone'=>$db_phone, 'region'=>$db_region, 'province'=>$db_province);

$JSONUser = json_encode($user);

$con->close();

echo $JSONUser
?>