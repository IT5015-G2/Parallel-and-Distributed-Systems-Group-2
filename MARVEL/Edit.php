<?php
    
        require("connect.php");
        $res =mysqli_query($conn, "SELECT * FROM marvel
                                     WHERE movie_id =".$_GET['id']);
        $data = mysqli_fetch_array($res);
    
?>
<html>
<head>
	
	<link rel='stylesheet' href='css/bootstrap.min.css'>
    <script src="js/prefixfree.min.js"></script>
</head>
<body>

<br>
<div class = 'row'>
	<div class ='col-md-6 col-md-offset-3' style="margin-top:3%;">
        <div class = 'panel panel-panel'>
            <div class = 'panel-heading'>
                <h3 class ='panel-title'>Update Information</h3>
            </div>
            <div class = 'panel-body'>
                <form method ='POST' action= 'Update.php' enctype="multipart/form-data">
                    <input type = 'text' value = '<?php echo $data[0]; ?>' name='id' class='hide' placeholder='id'>
                    <br>
                    <p>Movie Title</p>
                    <input type = 'text' value = '<?php echo $data['movie_Title']; ?>' name='title' class='form-control'>
                    <br>
                    <p>Movie Rating</p>
                    <input type = 'text' value = '<?php echo $data['movie_Rating']; ?>' name='rating' class='form-control'>
                    <br>
                    <p>Year Released</p>
                    <input type = 'text' value ='<?php echo $data['movie_Year']; ?>' name='year' class='form-control'>
                    <br>
                    <p>Budget</p>
                    <input type = 'text' value ='<?php echo $data['movie_Budget']; ?>' name='budget' class='form-control'>
                    <br>
                    <button class = 'btn btn-success pull-right'>SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script src='js/jquery.min.js'></script>
<script src='js/bootstrap.min.js'></script>
<script>
$(document).ready(function(){
	$(".check").on("click", function(){
		return confirm("Are you Sure?");

	});
});
</script>