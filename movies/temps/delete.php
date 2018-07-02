<?php
	session_start();
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "login";



$imgid = $_GET['imgid'];
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
$result1=mysqli_query($conn,"DELETE FROM image_comments WHERE img_id_fk = '$imgid'");

$result=mysqli_query($conn,"DELETE FROM imageuploads WHERE img_id='$imgid'");
header("Location: ../profile.php");

