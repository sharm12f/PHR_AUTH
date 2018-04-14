<?PHP

$invalid_chars = '/[^A-Z a-z0-9.@#\\-$]/';

if(isset($_POST['id'])){
	$id = $_POST['id'];
	if(preg_match($invalid_chars,$id)){
		die("error");	
	}
	$query = "SELECT N.ID, N.USER_ID, N.HEALTH_PROFESSIONAL_ID, N.NAME, HP.NAME, N.DESCRIPTION, N.CREATE_TIME FROM NOTES AS N, HEALTH_PROFESSIONAL_USER AS HP WHERE N.ID = ? AND HP.ID=N.HEALTH_PROFESSIONAL_ID;";
	execute($query,$id);
}
elseif(isset($_POST['user_id'])){
	$user_id = $_POST['user_id'];
	if(preg_match($invalid_chars,$user_id)){
		die("error");	
	}
	$query = "SELECT N.ID, N.USER_ID, N.HEALTH_PROFESSIONAL_ID, N.NAME, HP.NAME, N.DESCRIPTION, N.CREATE_TIME FROM NOTES AS N, HEALTH_PROFESSIONAL_USER AS HP WHERE N.USER_ID = ? AND HP.ID=N.HEALTH_PROFESSIONAL_ID;";
	execute($query,$user_id);
}
elseif(isset($_POST['health_professional_id'])){
	$health_professional_id = $_POST['health_professional_id'];
	if(preg_match($invalid_chars,$health_professional_id)){
		die("error");	
	}
	$query = "SELECT N.ID, N.USER_ID, N.HEALTH_PROFESSIONAL_ID, N.NAME, HP.NAME, N.DESCRIPTION, N.CREATE_TIME FROM NOTES AS N, HEALTH_PROFESSIONAL_USER AS HP WHERE N.HEALTH_PROFESSIONAL_ID = ? AND HP.ID=N.HEALTH_PROFESSIONAL_ID;";
	execute($query,$health_professional_id);
}
else{
	die("error");
}


function execute($query, $value){
	$DBUserName = "sharm12f_app";
	$DBPassword = "password";
	$DBName = "sharm12f_PHRAUTH";
	$DBHost = "localhost";
	$con = new mysqli($DBHost, $DBUserName, $DBPassword, $DBName);
	if($con->connect_error){
		die("error");
	}

	$stmt = $con->prepare($query);
	$stmt->bind_param("i",$value);
	$stmt->execute();
	$stmt->bind_result($db_id, $db_user_id, $db_health_professional_id, $db_name, $db_health_professional_name, $db_description, $db_create_time);
	$results = array();
	while($stmt->fetch()){
			$row = array('id'=>$db_id, 'user_id'=>$db_user_id, 'health_professional_id'=>$db_health_professional_id, 'name'=>$db_name, 'description'=>$db_description, 'health_professional_name'=>$db_health_professional_name, 'create_time'=>$db_create_time);
			$results[]=$row;
	}

	$JSONUser = json_encode($results);

	$con->close();

	echo $JSONUser;
}
?>
