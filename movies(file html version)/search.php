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
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12 topmost">
			<div class="col-lg-12">
				<img src = "img/backgrounds/marvel-logo.png" style = "width: 40%;height:100%">
				<h1 id="headtitle" style="display:inline-block"><a href="marvelmovies.php" id="menu">|Home</a><a href='#' class='dropdown-toggle' id='menu' data-toggle='modal' data-target='#deleteModal'>|Delete Movie</a><a href="movies.php" id="menu">|Movies</a><a href="search.php" id="menu" class="">|Search</a><a href='#' class='dropdown-toggle' id='menu' data-toggle='modal' data-target='#uploadModal'>|Add Movie</a><a href='#' class='dropdown-toggle' id='menu' data-toggle='modal' data-target='#uploadModal'>|Update Movie</a></h1>
			</div>
			
		</div>
	</div>
</div> 

<div class= "container target" id="displaydiv" style="background-color:black;opacity:0.9;width:50%;">
	<div class="search">
	<form method="post" action="search.php">
		<span id="categori" style="color:white;">Search</span>
		<input id="search1" type="text" name="name">
	</form>
	</div>	
	<div id="searchtarget">
	</div>
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
<script src = "scripts/bootstrap/js/bootstrap.min.js"></script>
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
$(function(){
	$('#search1').keydown(function(){
		var $x = $('#search1').val();
		console.log($x);
		$.ajax({
			type: 'POST',
			url: 'searchsql.php',
			data: {
				name: $x
			},
			success: function(data){
				$('#searchtarget').html(data);
			}
		});
	});
});
</script>
<script type='text/javascript'>
$.fn.stars = function() {
    return $(this).each(function() {
        // Get the value
        var val = parseFloat($(this).html());
        // Make sure that the value is in 0 - 5 range, multiply to get width
        var size = Math.max(0, (Math.min(5, val))) * 16;
        // Create stars holder
        var $span = $('<span />').width(size);
        // Replace the numerical value with stars
        $(this).html($span);
    });
}
$(function() {
    $('span.stars').stars();
});
</script>

</body>
</html>

