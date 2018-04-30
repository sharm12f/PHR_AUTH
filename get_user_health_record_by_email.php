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
$stmt = $con->prepare('SELECT H.ID, H.USER_ID, H.RECORD, H.CREATE_TIME, H.NAME, H.FILENAME FROM USER_HEALTH_RECORD AS H, USERS AS U WHERE U.ID = H.USER_ID AND U.EMAIL = ?');
$stmt->bind_param("s",$email);
$stmt->execute();
$stmt->bind_result($rid, $uid, $record, $create_time, $db_name, $db_filename);
$count = 0;
$results =  array();
while($stmt->fetch()){
	$row = array('rid'=>$rid, 'uid'=>$uid, 'record'=>$record, 'create_time'=>$create_time, 'name'=>$db_name, 'filename'=>$db_filename);
	$key="".$count;
	$results[]=$row;
	$count = $count+1;
}
$JSONObj = json_encode($results);

$con->close();

echo $JSONObj
?>
