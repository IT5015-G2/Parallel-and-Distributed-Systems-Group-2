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
			background-color:black;
			opacity:1.0;
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
		#profil{
			color:white;
			text-decoration:none;
		}
		#welcomeuser{
			margin-top:50px;
			margin-left:50px;
			float:left;
			color:white;
			font-family:"roboto";
			font-size:20px;
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
		#sharepar{
			font-family:"ffdin";
			font-size:20px;
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
			margin-top:100px;
			margin-left:100px;
			padding:0;
			height:300px;
			width:600px;
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
			<div class="col-lg-8">
				<h1 id="headtitle">Movie Reviews<a href="artsy.php" id="menu">Home</a><a href="#" id="menu">About</a><a href="artworks.php" id="menu">Artworks</a><a href="search.php" id="menu" class="">Search</a></h1>
			</div>
			<div class="col-lg-4">
					<div class='sign'>
					<a href='#' class='dropdown-toggle' id='signin' data-toggle='modal' data-target='#uploadModal'>Add Movie</a>
					<a href='#' class='dropdown-toggle' id='signin' data-toggle='modal' data-target='#myModal'>Rate Movie</a>
					</div>
			</div>
			
		</div>
	</div>
</div>   
    
<div class="container" id="sharediv" style="display:block">
	<div class="row">
		  <div id="myCarousel" class="carousel slide" data-ride="carousel" style="height:300px;width:100%">
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
					echo "<img src='temps/uploads/".$row['movie_pic']."' alt='Photography' style='width:100%;height:100%'>";
					echo "<div class='carousel-caption'>";
						echo "<h6>Photography</h6>";
					echo "</div>";
				?>
				
			  </div>

			  <div class="item">
				<?php
					$result = mysqli_query($conn,"SELECT * FROM movies WHERE movie_id = '2' limit 1");
					$row = mysqli_fetch_array($result);
					echo "<img src='temps/uploads/".$row['movie_pic']."' alt='Photography' style='width:100%;height:100%'>";
					echo "<div class='carousel-caption'>";
						echo "<h6>Painting</h6>";
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
<div> 
<!--Sign up form -->
<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
		<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Registration</h4>
				</div>
				<div class="modal-body">
					<form class="signup-form" action="backgroundincludes/signup.inc.php" method="POST">
						<input class="signup-text" type="text" name="first" placeholder = "First Name"><br><br>
						<input class="signup-text" type="text" name="last" placeholder = "Last Name"><br><br>
						<input class="signup-text" type="text" name="email" placeholder = "E-mail"><br><br>
						<input class="signup-text" type="text" name="uid" placeholder = "Username"><br><br>
						<input class="signup-text" type="password" name="pass" placeholder = "Password"><br><br>
						<button class = "signup" type="submit" name="submit">Sign Up</button>
					</form>
					<div class="vr">&nbsp;</div>
				</div>
				<div class="modal-footer">
					<small>edasdasdasdasda</small>
				</div>
			</div>
		</div>
</div>
	<!-- end of signup-->

	<!--sign in modal-->
<div id="myModal1" class="modal fade" role="dialog">
		<div class="modal-dialog">
		<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Sign-In</h4>
				</div>
				<div class="modal-body">
					<form class="signup-form" action="backgroundincludes/login.inc.php" method="POST">
						<input class="signup-text" type="text" name="uid" placeholder = "Username"><br><br>
						<input class="signup-text" type="password" name="pass" placeholder = "Password"><br><br>
						<button class = "login" type="submit" name="submit">Log In</button>
					</form>
					<div class="vr">&nbsp;</div>
				</div>
				<div class="modal-footer">
					<small>edasdasdasdasda</small>
				</div>
			</div>
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
						<input type="file" name="file"><br>
						<input type="text" name="title" placeholder = "Title"><br><br>
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
<script src = "scripts/bootstrap/js/bootstrap.js"></script>
<script src = "scripts/jquery-3.2.1.min.js"></script>
<script src = "scripts/magneticpopup/dist/jquery.magnific-popup.js"></script>
<script src = "scripts/magneticpopup/dist/jquery.magnific-popup.min.js"></script>
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
