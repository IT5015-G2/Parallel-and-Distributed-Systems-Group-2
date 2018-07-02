<?php
	
if(isset($_POST['submit'])){
	$conn = mysqli_connect("localhost", "root", "", "movies");
	
	$file = $_FILES['file'];
	$budget = $_POST['budget'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$box_office = $_POST['box_office'];
	$rating = $_POST['rating'];
	
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];
	
	$fileExt = explode('.',$fileName);
	$fileActualExt = strtolower(end($fileExt));
	
	$allowed = array('jpg','jpeg','png');
	
	if(in_array($fileActualExt,$allowed)){
		if($fileError===0){
			if($fileSize < 1000000){
				$fileNameNew = $fileName.".".$fileActualExt;
				$fileDestination = 'uploads/' . $fileNameNew;
				move_uploaded_file($fileTmpName,$fileDestination);
				$sql = "INSERT INTO movies (movie_title,movie_pic,movie_description,movie_budget,movie_box_office,movie_rating) VALUES ('$title','$fileNameNew','$description','$budget','$box_office','$rating')";
				mysqli_query($conn,$sql);
				
				header("Location: ../artsy.php?uploadsuccess");
			}else{
				echo "This file is too large";
			}
		}else{
			echo "There was an error uploading this file";
		}
	}else{
		echo "You cannot upload files of this type";
	}
}
