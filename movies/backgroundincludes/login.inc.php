<?php

session_start();

if(isset($_POST['submit'])){
	include 'dib.inc.php';
	
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pass = mysqli_real_escape_string($conn, $_POST['pass']);
	//error checking
	//if empty
	if(empty($uid) || empty($pass)){
		header("Location: ../artsy.php?login=empty");
		exit();
	}else{
		$sql = "SELECT * FROM users WHERE user_uid='$uid'";
		$result = mysqli_query($conn,$sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck<1){
			header("Location: ../artsy.php?=notfound");
			exit();
		}else{
			if($row = mysqli_fetch_assoc($result)){
				//dehash password
				$hashedPwdCheck = password_verify($pass, $row['user_pass']);
				if($hashedPwdCheck == false){
					header("Location: ../artsy.php?login=error");
					exit();
				}elseif($hashedPwdCheck == true){
					// Login user
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_last'] = $row['user_last'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_uid'] = $row['user_uid'];
					header("Location: ../artsy.php?login=success");
					exit();
				}
			}else{
				
			}
		}
	}
}else{
	header("Location: ../artsy.php?login=error");
	exit();
}