<?PHP
$DBUserName = "sharm12f_app";
$DBPassword = "password";
$DBName = "sharm12f_PHRAUTH";
$DBHost = "localhost";


if(!isset($_GET['email'])){
<<<<<<< HEAD
	die("No email");
=======
	die("error");
>>>>>>> master
}
else{
	$email = $_GET['email'];

	//check the username here for invalid chars die if fail.
<<<<<<< HEAD
=======
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
$stmt = $con->prepare('SELECT H.ID, H.USER_ID, H.RECORD, H.CREATE_TIME, H.NAME FROM USER_HEALTH_RECORD AS H, USERS AS U WHERE U.ID = H.USER_ID AND U.EMAIL = ?');
$stmt->bind_param("s",$email);
$stmt->execute();
$stmt->bind_result($rid, $uid, $record, $create_time, $db_name);
$count = 0;
$results =  array();
while($stmt->fetch()){
	$row = array('rid'=>$rid, 'uid'=>$uid, 'record'=>$record, 'create_time'=>$create_time, 'name'=>$db_name);
	$key="".$count;
	$results[]=$row;
	$count = $count+1;
}
$JSONObj = json_encode($results);

$con->close();

echo $JSONObj
?>