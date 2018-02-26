<?PHP
$DBUserName = "sharm12f_app";
$DBPassword = "password";
$DBName = "sharm12f_PHRAUTH";
$DBHost = "localhost";


if(!isset($_GET['id'])){
	die("No id");
}
else{
	$id = $_GET['id'];

	//check the username here for invalid chars die if fail.
}

$con = new mysqli($DBHost, $DBUserName, $DBPassword, $DBName);
if($con->connect_error){
	die("Connection error: " .  $con->connect_error);
}
$stmt = $con->prepare('SELECT ID, USER_ID, RECORD, CREATE_TIME, NAME FROM USER_HEALTH_RECORD WHERE ID = ?');
$stmt->bind_param("s",$id);
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