<?php

session_start();

		$imgid = $_POST['id'];
		$rate =$_POST['rate'];
		$id=$_POST['userid'];
		$conn = mysqli_connect("localhost", "root", "", "login");
		
		$sql = "SELECT * FROM image_rating WHERE img_id_fk = '$imgid' AND uid_fk = '$id'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck>0){
			
		}else{
		$insert=mysqli_query($conn,"INSERT INTO image_rating(img_id_fk,uid_fk,rating) VALUES ('$imgid','$id','$rate')");
		}
?>