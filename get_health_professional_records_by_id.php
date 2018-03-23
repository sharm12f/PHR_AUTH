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
$stmt = $con->prepare('SELECT HH.USER_HEALTH_RECORD_ID FROM HEALTH_PROFESSIONAL_USER AS H, HEALTH_PROFESSIONAL_HAS_USER_HEALTH_RECORD AS HH WHERE H.ID = HH.HEALTH_PROFESSIONAL_ID AND H.ID=?');
$stmt->bind_param("s",$id);
$stmt->execute();
$stmt->bind_result($rid);
$count = 0;
$results =  array();
while($stmt->fetch()){
	$row = array('rid'=>$rid);
	$key="".$count;
	$results[]=$row;
	$count = $count+1;
}
$JSONObj = json_encode($results);

$con->close();

echo $JSONObj
?>