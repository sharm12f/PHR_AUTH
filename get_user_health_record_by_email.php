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
$stmt = $con->prepare('select H.id, H.user_id, H.record, H.create_time, H.name from user_health_record as H, users as U where U.id = H.user_id and U.email = ?');
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