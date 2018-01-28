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
$stmt = $con->prepare('select H.id, H.user_id, H.cypertext_policy, H.cypertext_record, H.cypertext_record_ref, H.create_time from user_health_record as H, users as U where U.id = H.user_id and U.email = ?');
$stmt->bind_param("s",$email);
$stmt->execute();
$stmt->bind_result($rid, $uid, $cypertext_policy, $cypertext_record, $cypertext_record_ref, $create_time);
$count = 0;
$results =  array();
while($stmt->fetch()){
	$row = array('rid'=>$rid, 'uid'=>$uid, 'cypertext_policy'=>$cypertext_policy, 'cypertext_record'=>$cypertext_record, 'cypertext_record_ref'=>$cypertext_record_ref, 'create_time'=>$create_time);
	$key="".$count;
	$results[]=$row;
	$count = $count+1;
}
$JSONObj = json_encode($results);

$con->close();

echo $JSONObj
?>