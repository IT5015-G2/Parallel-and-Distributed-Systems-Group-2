<?php

session_start();

		$imgid = $_POST['id'];
		$comment =$_POST['comment'];
		$id=$_POST['userid'];
	$conn = mysqli_connect("localhost", "root", "", "login");
	
		$insert=mysqli_query($conn,"INSERT INTO image_comments(img_id_fk,uid_fk,comment) VALUES ('$imgid','$id','$comment')");
?>