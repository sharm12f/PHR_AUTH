<?php
  
	$id = $_POST['user_name'];
  
	$file_path = "uploads/".$id."/";
	
	if (!file_exists($file_path)) {
		mkdir($file_path, 0777, true);
	}
	
    $file_path = $file_path . basename( $_FILES['uploaded_file']['name']);

    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
        echo "success";
    } else{
        echo "fail";
    }
 ?>