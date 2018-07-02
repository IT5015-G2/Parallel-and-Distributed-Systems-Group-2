<?php 
	
if(isset($_POST['submit'])){
	include_once('dib.inc.php');
	
	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$pass = mysqli_real_escape_string($conn, $_POST['pass']);
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	
	//Errors
	//Check if empty
	if(empty($first || $last || $email || $pass || $uid)){
		exit();
	}else{
		//Check if first and last name are valid
		if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){
			exit();
		}else{
			//Check if email is valid
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				exit();
			}else{
				$sql = "SELECT * FROM users WHERE user_uid='$uid'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				
				if($resultCheck>0){
					exit();
				}else{
					//Check if password is hashed
					$hashedPwd = password_hash($pass, PASSWORD_DEFAULT);
					//insert user to database
					$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pass) VALUES ('$first','$last','$email','$uid', '$hashedPwd');";
					mysqli_query($conn,$sql);
					$sql1 = "INSERT INTO imageuploads (image) VALUES ('qwe.jpg')";
					mysqli_query($conn,$sql1);
					
					header("Location:../artsy.php");
					exit();
				}
			}
		}
	}
	
}else{
	exit();
}
