<?PHP
$DBUserName = "sharm12f_app";
$DBPassword = "password";
$DBName = "sharm12f_PHRAUTH";
$DBHost = "localhost";


if(!isset($_POST['id'])){
	die("error");
}
else{
	$id = $_POST['id'];
	
	//check the username here for invalid chars die if fail.
	if($id < 0){
		die("error");	
	}	
}

$con = new mysqli($DBHost, $DBUserName, $DBPassword, $DBName);
if($con->connect_error){
	die("Connection error: " .  $con->connect_error);
}

$stmt = $con->prepare("SELECT HP.ID, HP.NAME, R.ID, R.NAME, P.ID FROM HEALTH_PROFESSIONAL_USER AS HP, HEALTH_PROFESSIONAL_HAS_USER_HEALTH_RECORD AS P, USER_HEALTH_RECORD AS R WHERE P.USER_HEALTH_RECORD_ID = ? AND P.HEALTH_PROFESSIONAL_ID = HP.ID AND  P.USER_HEALTH_RECORD_ID = R.ID");
$stmt->bind_param("i",$id);
$stmt->execute();
$stmt->bind_result($dbhpid, $dbhpname, $dbrid, $dbrname, $dbpid);
$results = array();
while($stmt->fetch()){
	$row = array('hpid'=>$dbhpid, 'hpname'=>$dbhpname, 'rid'=> $dbrid, 'rname'=>$dbrname, 'pid'=>$dbpid);
	$results[]=$row;
}
$JSONObj = json_encode($results);

$con->close();

echo $JSONObj
?>