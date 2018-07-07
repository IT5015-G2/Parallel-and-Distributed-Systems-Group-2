<?php
	
if(isset($_POST['submit'])){
	$conn = mysqli_connect("localhost", "root", "", "movies");
	
	$file = $_FILES['file'];
	$wide_file = $_FILES['wide_file'];
	$budget = $_POST['budget'];
	$title = $_POST['title'];
	$year = $_POST['year'];
	$description = $_POST['description'];
	$box_office = $_POST['box_office'];
	$rating = $_POST['rating'];
	
	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileNameWide = $_FILES['wide_file']['name'];
	$fileTmpNameWide = $_FILES['wide_file']['tmp_name'];
	$fileSizeWide = $_FILES['wide_file']['size'];
	$fileErrorWide = $_FILES['wide_file']['error'];
	$fileTypeWide = $_FILES['wide_file']['type'];
	
	$fileExt = explode('.',$fileName);
	$fileActualExt = strtolower(end($fileExt));
	
	$widefileExt = explode('.',$fileNameWide);
	$widefileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg','jpeg','png');
	
	if(in_array($fileActualExt,$allowed) && in_array($widefileActualExt, $allowed)){
		if($fileError===0 && $fileErrorWide===0){
			if($fileSize < 1000000 && $fileSizeWide < 1000000){
				$fileNameNew = $fileName.".".$fileActualExt;
				$fileDestination = 'uploads/' . $fileNameNew;

				$fileNameNewWide = $fileNameWide.".".$widefileActualExt;
				$fileDestinationWide = 'uploads/' . $fileNameNewWide;

				move_uploaded_file($fileTmpName,$fileDestination);
				move_uploaded_file($fileTmpNameWide,$fileDestinationWide);

				$newDescription = mysqli_real_escape_string($conn,$description);

				$sql = "INSERT INTO `movies` (`movie_id`, `movie_title`,`movie_year`, `movie_pic`, `movie_wide_pic`, `movie_rating`, `movie_description`, `movie_budget`, `movie_box_office`) VALUES (NULL, '$title','$year', '$fileNameNew', '$fileNameNewWide', '$rating', '$newDescription', '$budget', '$box_office')";
				$db = mysqli_query($conn,$sql);
				if($db){
					header("Location: ../marvelmovies.php?".$newDescription."");
				}else{
					echo mysqli_error($conn);
				}
				
			}else{
				echo "This file is too large";
			}
		}else{
			echo $fileErrorWide;
			echo "There was an error uploading this file";
		}
	}else{
		echo "You cannot upload files of this type";
	}
}
