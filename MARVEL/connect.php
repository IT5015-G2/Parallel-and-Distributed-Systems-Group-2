<?php

	$conn = mysqli_connect("localhost", "root", "", "movies");

	if(!$conn){
		echo "Error Connecting to DB";
		exit();
	}
?>
