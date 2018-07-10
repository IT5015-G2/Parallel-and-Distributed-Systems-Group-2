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
			width:10	0%;
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
			font-size:25px;
			margin-left:5%;
		}
		#movie_rating{
			font-family:"roboto";
			font-size:20px;
		}
		#movie_description{
			font-family:"roboto";
			width:90%;
			height:50%;
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
<div class= "container target" id="displaydiv">
	<?php
	$result = mysqli_query($conn,"SELECT * FROM movies ORDER BY movie_title ASC");

	while ($row = mysqli_fetch_array($result)) {
			echo "<div class = 'row' style='background-color:black;opacity:0.9;'>";
			echo "<h5 id = 'movie_rating' style='float:right;margin-right:5%;margin-top:2%;'><b>Rating: ".$row['movie_rating']."</b></h5>";
			echo "<h1 id='movie_title' style='color:white'><a href='moviepage.php?movie_id=".$row['movie_id']."' class = 'box'style='text-decoration:none;color:white'>".$row['movie_title']."</a></h1>";
			echo "</div>";
			
	}
	?>
	
</div>                                                   
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
						<input type="text" name="file"><span>Profile</span><br><br>
						<input type="text" name="wide_file"><span>Wide Profile</span><br><br>
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
<script src = "scripts/jquery-3.2.1.js"></script>
<script src = "scripts/magneticpopup/dist/jquery.magnific-popup.js"></script>
<script>
function derfunction(val){
	var $spanimgid =  val;
	console.log($spanimgid);
	$.ajax({
		type: 'POST',
		url: 'getmax.php',
		data: {
			spanimgid: $spanimgid
		},
		success:function(returned){
			console.log(returned);
			alert(returned);
		}
	});
	
	

}
</script>
<script>
$(function() {

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

	$('.books').magnificPopup({
		type: 'ajax',
		alignTop: true,
		
	});
	
});
</script> 

</body>
</html>
