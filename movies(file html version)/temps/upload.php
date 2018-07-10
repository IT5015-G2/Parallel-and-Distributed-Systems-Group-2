<?php
	
if(isset($_POST['submit'])){
	$conn = mysqli_connect("localhost", "root", "", "movies");
	
	$file = $_POST['file'];
	$wide_file = $_POST['wide_file'];
	$budget = $_POST['budget'];
	$title = $_POST['title'];
	$year = $_POST['year'];
	$description = $_POST['description'];
	$box_office = $_POST['box_office'];
	$rating = $_POST['rating'];


				$htmlprofile = mysqli_real_escape_string($conn,$file);
				$htmlwidefile = mysqli_real_escape_string($conn,$wide_file);
				$newDescription = mysqli_real_escape_string($conn,$description);

				$sql = "INSERT INTO `movies` (`movie_id`, `movie_title`,`movie_year`, `movie_pic`, `movie_wide_pic`, `movie_rating`, `movie_description`, `movie_budget`, `movie_box_office`) VALUES (NULL, '$title','$year', '$htmlprofile', '$htmlwidefile', '$rating', '$newDescription', '$budget', '$box_office')";
				$db = mysqli_query($conn,$sql);
				if($db){
					header("Location: ../marvelmovies.php?".$newDescription."");
				}else{
					echo mysqli_error($conn);
				}
}
