<?php

	require("connect.php");
    $id = $_GET['id'];
    
    $sql = "DELETE FROM marvel WHERE movie_id='{$id}'";

    if ($conn->query($sql) === TRUE) {
    header("location:home.php");
    } else {
    echo "Error deleting record: " . $conn->error;
    }
?>