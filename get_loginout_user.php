<?PHP
$DBUserName = "sharm12f_app";
$DBPassword = "password";
$DBName = "sharm12f_PHRAUTH";
$DBHost = "localhost";


if(!isset($_POST['id'])){
	die("error one");
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
	die("error two");
}

$stmt = $con->prepare("SELECT LOGIN, LOGOUT FROM USERS WHERE ID = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($db_login, $db_logout);
$count=0;
while($stmt->fetch()){
	$count+=1;
	$row = array('login'=>$db_login, 'logout'=>$db_logout);
	$results[] = $row;
}

if($count == 1){
	$JSONUser = json_encode($results);
	echo $JSONUser;
}
else{
	echo "error";
}


$con->close();
?>
