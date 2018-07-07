<?php

if(isset($_POST['submit'])){
	$conn = mysqli_connect("localhost", "root", "", "movies");

	$title = $_POST['title'];
	$result1=mysqli_query($conn,"DELETE FROM movies WHERE movie_title = '$title'");
	header("Location: ../marvelmovies.php");
}

