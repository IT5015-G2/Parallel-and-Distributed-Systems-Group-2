<?php
    if(isset($_POST['submit'])){
        $conn = mysqli_connect("localhost", "root", "", "movies");


        $id = $_POST['id'];
        $title = $_POST['title'];
        $budget = $_POST['budget'];
        $rating = $_POST['rating'];
        $box_office = $_POST['box_office'];
        $year = $_POST['year'];

        

        $result = mysqli_query($conn, "UPDATE movies SET movie_title = '$title',  movie_year = '$year',movie_budget = '$budget', movie_rating = '$rating', movie_box_office = '$box_office' WHERE movie_id = '$id'");
        header("Location:../marvelmovies.php");
    }

    
?>