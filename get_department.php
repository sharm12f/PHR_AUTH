<?PHP
$DBUserName = "app";
$DBPassword = "password";
$DBName = "phr_auth";
$DBHost = "localhost";

$con = new mysqli($DBHost, $DBUserName, $DBPassword, $DBName);
if($con->connect_error){
	die("Connection error: " .  $con->connect_error);
}

$stmt = $con->prepare("select name from department");
$stmt->execute();
$stmt->bind_result($dbdepartment);
$count = 0;
$results =  array();
while($stmt->fetch()){
	$row = array('name'=>$dbdepartment);
	$key="".$count;
	$results[]=$row;
	$count = $count+1;
}
$JSONObj = json_encode($results);

$con->close();

echo $JSONObj
?>