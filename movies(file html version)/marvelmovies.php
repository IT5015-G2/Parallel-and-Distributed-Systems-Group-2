<?php
	session_start();
	$conn = mysqli_connect("localhost", "root", "", "movies");
?>


<html>
	<head>
	 <link rel = "stylesheet" href = "scripts/bootstrap/css/bootstrap.css">
	 <link rel = "stylesheet" href = "scripts/bootstrap/css/bootstrap.min.css">
	 <link rel = "stylesheet" href = "scripts/magneticpopup/dist/magnific-popup.css">
	<link rel="stylesheet" href="scripts/fontawesome/css/font-awesome.min.css">
	<script src = "scripts/jquery-3.2.1.js"></script>
	 <style>
		body{
						background-image: url(img/backgrounds/marvelbackground.png);

			min-height:100%;

			background-attachment: fixed;
			background-position: fixed;
			background-repeat:no-repeat;
			background-size: cover;
		}
		.navbar{
			margin-left:50%;
		}
		@font-face{
			font-family: "roboto";
			src: url(fonts/roboto/robotothin.ttf);
		}
		@font-face{
			font-family: "ffdin";
			src: url(fonts/ffdin/DIN.ttf);
		}
		span,span:hover{
			text-decoration:none;
		}
		.displayer{
			height:100%;
			width:100%;
		}
		.target{
			margin-top:100px;
		}
		.topmost{
			background-color: black;
			opacity:0.8;
			height:20%;
		}
		#signin{
			margin-top:20px;
			margin-right:15px;
			font-family: "roboto";
			font-size:20px;
			float:right;
			color:white;
			text-decoration:none;
		}
		#headtitle{
			color:white;
			font-size:80px;
			font-family:"roboto";
		}
		#menu{
			text-decoration:none;
			color:white;
			padding:10px;
			font-size:20px;
		}
		#share{
			font-family:"roboto";
			margin-top:100px;
			font-size:100px;
		}
		#movie_title{
			font-family:"roboto";
			font-size:40px;
			text-decoration: none;
			color:white;
		}
		#movie_rating{
			font-family:"roboto";
			font-size:20px;
		}
		#movie_description{
			font-family:"roboto";
			width:90%;
			height:150px;
			font-size:20px;
			overflow:hidden;
			text-overflow:ellipsis;
		}
		.overlay {
		  position: absolute;
		  top: 0;
		  bottom: 0;
		  left: 0;
		  right: 0;
		  height: 100%;
		  width: 100%;
		  opacity: 0;
		  transition: .5s ease;
		  background-color: black;
		}
		.box:hover .overlay {
		  opacity: 0.8;
		}
		.text {
		  font-family:"roboto";
		  color: white;
		  font-size: 50px;
		  position: absolute;
		  top: 50%;
		  left: 50%;
		  transform: translate(-50%, -50%);
		  -ms-transform: translate(-50%, -50%);
		}

		.box{
		}
		.modal-content{
			-webkit-border-radius: 0px;
			-moz-border-radius: 0px;
			border-radius: 0px; 
		}
		.sign{
			margin-top:45px;
		}
		.popupajaxart{
			margin-top:100px;
			background-color:white;
		}
		.mfp-fade.mfp-bg {
			opacity: 0;
			-webkit-transition: all 0.15s ease-out; 
			-moz-transition: all 0.15s ease-out; 
			transition: all 0.15s ease-out;
		}
		.mfp-fade.mfp-bg.mfp-ready {
			opacity: 0.8;
		}
		.mfp-fade.mfp-bg.mfp-removing {
			opacity: 0;
		}

		.mfp-fade.mfp-wrap .mfp-content {
			opacity: 0;
			-webkit-transition: all 0.15s ease-out; 
			-moz-transition: all 0.15s ease-out; 
			transition: all 0.15s ease-out;
		}
		.mfp-fade.mfp-wrap.mfp-ready .mfp-content {
			opacity: 1;
		}
		.mfp-fade.mfp-wrap.mfp-removing .mfp-content {
			opacity: 0;
		}
		#imgtitle{
			font-family:"ffdin";
			font-size:30px;
		}
		#desc{
			font-family:"ffdin";
			font-size:20px;
		}
		.mfp-image-holder .mfp-close, .mfp-iframe-holder .mfp-close{
			color: white;
		}
		.mfp-image-holder .mfp-close:hover, .mfp-iframe-holder .mfp-close:hover{
			color: white;
			border-color: white;
		}
		<!--star system css-->
		div.stars {
		  width: 270px;
		  display: inline-block;
		}
		input.star{ 
			display: none; 
		}
		label.star{
		  float: right;
		  padding: 10px;
		  font-size: 36px;
		  color: #444;
		  transition: all .2s;
		}
		input.star:checked ~ label.star:before{
		  content: '\f005';
		  color: #FD4;
		  transition: all .25s;
		}
		input.star-5:checked ~ label.star:before {
		  color: #FE7;
		  text-shadow: 0 0 20px #952;
		}
		input.star-1:checked ~ label.star:before {
			color: #F62; 
		}
		label.star:hover { 
			transform: rotate(-15deg) scale(1.3); 
		}
		label.star:before {
		  content: '\f006';
		  font-family: FontAwesome;
		}
		
	 </style>
	</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12 topmost">
			<div class="col-lg-12">
				<img src = "img/backgrounds/marvel-logo.png" style = "width: 40%;height:100%">
				<h1 id="headtitle" style="display:inline-block"><a href="marvelmovies.php" id="menu">|Home</a><a href='#' class='dropdown-toggle' id='menu' data-toggle='modal' data-target='#deleteModal'>|Delete Movie</a><a href="movies.php" id="menu">|Movies</a><a href="search.php" id="menu" class="">|Search</a><a href='#' class='dropdown-toggle' id='menu' data-toggle='modal' data-target='#uploadModal'>|Add Movie</a><a href='#' class='dropdown-toggle' id='menu' data-toggle='modal' data-target='#updateModal'>|Update Movie</a></h1>
			</div>
			
		</div>
	</div>
</div>   
<div class="container">
	<div class="row">
		<h1 id = 'share' style="background-color:black;opacity:0.9;color:white">H<small style = "color:white">ighest Rated Movies</small></h1>
	</div>
	<hr>
</div>
<div class="container" id="sharediv" style="display:block">
	<div class="row">
		 	 <div class="col-lg-8">
			  	<div id="myCarousel" class="carousel slide" data-ride="carousel" style="height:50%;width:100%;opacity:0.9">
				<!-- Indicators -->
				<ol class="carousel-indicators">
				  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				  <li data-target="#myCarousel" data-slide-to="1"></li>
				  <li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner">

				  <div class="item active">
					<?php
						$result = mysqli_query($conn,"SELECT * FROM movies ORDER BY movie_rating DESC limit 1");
						$row = mysqli_fetch_array($result);
						echo "<img src='".$row['movie_wide_pic']."' style='width:100%;height:100%'>";
						echo "<div class='carousel-caption'>";
							echo "<h6>".$row['movie_title']."</h6>";
						echo "</div>";
					?>
					
				  </div>
				 	<?php
				 	$result = mysqli_query($conn,"SELECT * FROM movies ORDER BY movie_rating DESC limit 2 offset 1");
					while($row = mysqli_fetch_array($result)){
						echo "<div class='item'>";
							echo "<img src='".$row['movie_wide_pic']."' style='width:100%;height:100%;'>";
							echo "<div class='carousel-caption'>";
							echo "</div>";
				  		echo "</div>";
					}
				  	
				?>
			  
				</div>

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				  <span class="glyphicon glyphicon-chevron-left"></span>
				  <span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
				  <span class="glyphicon glyphicon-chevron-right"></span>
				  <span class="sr-only">Next</span>
				</a>
			  </div> 
		 	 </div>
		 	 <div class="col-lg-4" style = 'background-color:black;opacity:0.9'>
		 	 	<h1 id="movie_title" style="font-size:20px">List of highest rated movies</h1>
		 	 	<?php
		 	 		$result = mysqli_query($conn,"SELECT * FROM movies ORDER BY movie_rating DESC limit 3");
			 	 	while($row = mysqli_fetch_array($result)){
			 	 		echo "<div class = 'row'>";
						echo "<a href = 'moviepage.php?movie_id=".$row['movie_id']."'id='movie_title' style='font-size:20px;margin-left:4%;' class='box'>".$row['movie_title']."</a>";
						echo "<small id = 'movie_rating'> (".$row['movie_year'].")</small>";
						echo "<h5 id = 'movie_rating' style='margin-left:4%;margin-top:3%;'><b>Rating: ".$row['movie_rating']."</b></h5>";
						echo "</div>";
			 	 	}
		 	 	?>
		 	 </div>
		        
	</div>
</div> 
<div class = "container">
	<div class = "row">
	<h1 id = 'share' style="background-color:black;opacity:0.9;color:white">R<small style = "color:white">ecently Added Movies</small></h1>
	<hr>
	<?php
	$result = mysqli_query($conn,"SELECT * FROM movies ORDER BY movie_id DESC LIMIT 2");
	while($row = mysqli_fetch_array($result)){
		echo "<div class = 'container' style='background-color:black;color:white;opacity:0.9;height:50%'>";
			echo "<div class = 'col-lg-4' style='margin-top:5%;'>";
			echo "<img src='".$row['movie_pic']."' style='width:350px;height:250px'>";
			echo "</div>";
			echo "<div class = 'col-lg-8' style='margin-top:3%;'>";
				echo "<div class = 'row'>";
					echo "<a href = 'moviepage.php?movie_id=".$row['movie_id']."'id='movie_title' style='margin-top:100px;' class='box'>".$row['movie_title']."</a>";
					echo "<small id = 'movie_rating'> (".$row['movie_year'].")</small>";
					echo "<h5 id = 'movie_rating' style='margin-right:5%;margin-top:3%;'><b>Rating: ".$row['movie_rating']."</b></h5>";
				echo "</div>";
				echo "<div class = 'row'>";
					echo "<p id='movie_description'>".$row['movie_description']."</p>";
				echo "</div>";
			echo "</div>";
		echo "</div>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
	}
	?>
	</div>
</div>
<!-- Upload Modal -->
<div id="uploadModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
		<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Upload</h4>
				</div>
				<div class="modal-body">
					<form action="temps/upload.php" method="POST" enctype="multipart/form-data">
						<input type="text" name="file"><span> Profile</span><br><br>
						<input type="text" name="wide_file"><span> Wide Profile</span><br><br>
						<input type="text" name="title" placeholder = "Title"><br><br>
						<input type="text" name="year" placeholder="Year"><br><br>
						<input type="text" name="description" placeholder = "Description"><br><br>
						<input type="text" name="budget" placeholder = "Budget Total"><br><br>
						<input type="text" name="box_office" placeholder = "Box Office Total"><br><br>
						<input type="text" name="rating" placeholder = "Rating"><br><br>
						<button type="submit" name="submit">Upload</button> 
					</form>
					<div class="vr">&nbsp;</div>
				</div>
				<div class="modal-footer">
					<small>2018</small>
				</div>
			</div>
		</div>
</div>
<!--delete modal -->
<div id="deleteModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
		<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Upload</h4>
				</div>
				<div class="modal-body">
					<form action="temps/delete.php" method="POST" enctype="multipart/form-data">
						<span>Choose Movie to Delete</span>
						<input type="text" name="title" placeholder = "Title"><br><br>
						<button type="submit" name="submit">Delete</button> 
					</form>
					<div class="vr">&nbsp;</div>
				</div>
				<div class="modal-footer">
					<small>2018</small>
				</div>
			</div>
		</div>
</div>
<!-- update modal -->
<div id="updateModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
		<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Update</h4>
				</div>
				<div class="modal-body">
					<form action="temps/update.php" method="POST" enctype="multipart/form-data">
						<input type="text" name="id" placeholder="Movie ID"><span>Enter Movie ID to update</span><br><br>
						<input type="text" name="title" placeholder = "Title"><br><br>
						<input type="text" name="year" placeholder = "Year"><br><br>
						<input type="text" name="budget" placeholder = "Budget Total"><br><br>
						<input type="text" name="box_office" placeholder = "Box Office Total"><br><br>
						<input type="text" name="rating" placeholder = "Rating"><br><br>
						<button type="submit" name="submit">Update</button> 
					</form>
					<div class="vr">&nbsp;</div>
				</div>
				<div class="modal-footer">
					<small>2018</small>
				</div>
			</div>
		</div>
</div>
<script src = "scripts/bootstrap/js/bootstrap.js"></script>
<script src = "scripts/jquery-3.2.1.min.js"></script>
<script src = "scripts/magneticpopup/dist/jquery.magnific-popup.js"></script>
<script src = "scripts/magneticpopup/dist/jquery.magnific-popup.min.js"></script>
<script>
$(document).ready(function() {

	$('.box').magnificPopup({
		type: 'ajax',
		alignTop: true,
		mainClass: 'mfp-fade',
		removalDelay: 160,
		disableOn: 700,
      closeOnBgClick: false ,
		overflowY: 'scroll'
	});
	
});
</script>
<script>
$(document).ready(function() {

	$('.userbox').magnificPopup({
		type: 'ajax',
		alignTop: true,
		mainClass: 'mfp-fade',
		removalDelay: 160,
		disableOn: 700,
      closeOnBgClick: false ,
		overflowY: 'scroll'
	});
	
});
</script>
<script>
$(function() {

	$('.books').magnificPopup({
		type: 'ajax',
		alignTop: true,
		mainClass: 'mfp-fade',
		removalDelay: 160,
		disableOn: 700,
      closeOnBgClick: false ,
		overflowY: 'scroll'
	});
	
});
</script>
</body>
</html>
