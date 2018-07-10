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
			font-size:50px;
			color:white;
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
		#categori{
			font-family:"roboto";
			font-size:25px;
			padding-bottom: 0px;
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
		  text-decoration: none;
		  color:white;
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
			font-family: "roboto";
			color:white;
			text-decoration: none;
			padding:0;
			font-size:20px;
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
	 </style>
	</head>
<body>
<div class = "container">
	<div class="row" style = 'background-color: black;opacity: 0.9;margin-top:5%'>
			<?php
				echo "<div class = 'col-lg-4' style = 'margin-top:5%'>";
				$conn = mysqli_connect("localhost", "root", "", "movies");
				$movie_id = $_GET['movie_id'];

				$result = mysqli_query($conn, "SELECT * FROM movies WHERE movie_id = '$movie_id'");
				$row = mysqli_fetch_assoc($result);
				echo "<img src='temps/uploads/".$row['movie_pic']."' style='width:350px;height:250px;margin-top:5%;margin-left:5%;'>";
				echo "<h3 id='movie_rating' style='color:white; margin-left:5%;font-size:25px'>Budget: ".$row['movie_budget']."</h3>";
				echo "<h3 id='movie_rating' style='color:white; margin-left:5%;font-size:25px'>Box Office: ".$row['movie_box_office']."</h3>";

			
				echo "</div>";
				echo "<div class='col-lg-8'>";
					echo "<h1 id = 'movie_title' style='margin-top:10%'>".$row['movie_title']."<small id='movie_rating' style='color:white;'> (".$row['movie_year'].")</small></h1>";
					echo "<span id = 'movie_title'>Rating: ".$row['movie_rating']."</span>";
					echo "<hr>";
					echo "<h3 id='movie_description' style='color:white;'>".$row['movie_description']."</h3>";
				echo "</div>";
		?>
	</div>
</div>                                                  
<script src = "scripts/bootstrap/js/bootstrap.min.js"></script>
<script src = "scripts/jquery-3.2.1.min.js"></script>
<script src = "scripts/magneticpopup/dist/jquery.magnific-popup.js"></script>
<script src = "scripts/magneticpopup/dist/jquery.magnific-popup.min.js"></script>
</body>
</html>

