<?PHP
$DBUserName = "sharm12f_app";
$DBPassword = "password";
$DBName = "sharm12f_PHRAUTH";
$DBHost = "localhost";

$bitset="";

$query = "SELECT EMAIL FROM HEALTH_PROFESSIONAL_USER";
if(isset($_POST['region'])){
	$region=$_POST['region'];
	if(substr($query,-1) == "D"){
		$query .= " REGION = '".$region."'AND";
	}
	else if (substr($query,-1) == " "){
		$query .= "AND REGION = '".$region."' ";
	}
	else{
		$query .= " WHERE REGION = '".$region."' ";
	}
}

if(isset($_POST['province'])){
	$province=$_POST['province'];
	if(substr($query,-1) == "D"){
		$query .= " PROVINCE = '".$province."'AND";
	}
	else if (substr($query,-1) == " "){
		$query .= "AND PROVINCE = '".$province."' ";
	}
	else{
		$query .= " WHERE PROVINCE = '".$province."' ";
	}
}

if(isset($_POST['organization'])){
	$organization=$_POST['organization'];
	if(substr($query,-1) == "D"){
		$query .= " ORGANIZATION = '".$organization."'AND";
	}
	else if (substr($query,-1) == " "){
		$query .= "AND ORGANIZATION = '".$organization."' ";	
	}
	else{
		$query .= " WHERE ORGANIZATION = '".$organization."' ";
	}
}
if(isset($_POST['department'])){
	$department=$_POST['department'];
	if(substr($query,-1) == "D"){
		$query .= " DEPARTMENT = '".$department."'AND";	
	}
	else if (substr($query,-1) == " "){
		$query .= "AND DEPARTMENT = '".$department."' ";	
	}
	else{
		$query .= " WHERE DEPARTMENT = '".$department."' ";	
	}
}
if(isset($_POST['healthProfessional'])){
	$healthProfessional=$_POST['healthProfessional'];
	if(substr($query,-1) == "D"){
		$query .= " HEALTH_PROFESSIONAL = '".$healthProfessional."'AND";
	}
	else if (substr($query,-1) == " "){
		$query .= "AND HEALTH_PROFESSIONAL = '".$healthProfessional."' ";	
	}
	else{
		$query .= " WHERE HEALTH_PROFESSIONAL = '".$healthProfessional."' ";	
	}
}

$con = new mysqli($DBHost, $DBUserName, $DBPassword, $DBName);
if($con->connect_error){
	die("error");
}

$stmt = $con->prepare($query);

$stmt->bind_result($dbemail);
$stmt->execute();
$results = array();
while($stmt->fetch()){
	$row = array('email'=>$dbemail);
	$results[]=$row;
}

$JSONUser = json_encode($results);

$con->close();

echo $JSONUser;


?>
