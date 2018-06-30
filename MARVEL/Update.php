<?php
     require("connect.php");
    if(isset($_POST['title']) && isset($_POST['year']) && isset($_POST['rating'])){
        $id = $_POST['id'];
        $name = $_POST['title'];
        $year = $_POST['year'];
        $budget = $_POST['budget'];
        $rating = $_POST['rating'];

        $qry = "UPDATE `marvel` SET `movie_Title` = '".$name."', `movie_Year` = '".$year."', `movie_Budget` = '".$budget."', `movie_Rating` = '".$rating."' WHERE `movie_id` = ".$id."";

        $result = mysqli_query($conn, $qry);
    
        if($result){
            header("location:home.php");
        }
    }

    
?>