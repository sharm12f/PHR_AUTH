<?PHP
$DBUserName = "sharm12f_app";
$DBPassword = "password";
$DBName = "sharm12f_PHRAUTH";
$DBHost = "localhost";

$con = new mysqli($DBHost, $DBUserName, $DBPassword, $DBName);
if($con->connect_error){
	die("Connection error: " .  $con->connect_error);
}

$stmt = $con->prepare("SELECT NAME FROM HEALTH_PROFESSIONAL");
$stmt->execute();
$stmt->bind_result($dbhealth_professional);
$count = 0;
$results =  array();
while($stmt->fetch()){
	$row = array('name'=>$dbhealth_professional);
	$key="".$count;
	$results[]=$row;
	$count = $count+1;
}
$JSONObj = json_encode($results);

$con->close();

echo $JSONObj
?>