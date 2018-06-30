<?php

	require("connect.php");

	$mTitle = $_POST['movTitle'];
	$mRating =  $_POST['movRating'];
	$mBudget =   $_POST['movBudget'];
	$mYear = $_POST['movYear'];

	$sql = "INSERT INTO `marvel`(`movie_ID`, `movie_Title`, `movie_Rating`, `movie_Budget`, `movie_Year`) VALUES ('{$mTitle}','{$mRating}','{$mBudget}','{$mYear}')";
			
	$result = mysqli_query($conn, $sql);
	
	if(!$result){
		echo "error in your query";
		exit();
	}else{
		header("location:home.php");
	}
?>