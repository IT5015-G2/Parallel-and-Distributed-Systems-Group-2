<?php
	session_start();
	$conn = mysqli_connect("localhost", "root", "", "login");
?>


<html>
	<head>
	 <link rel = "stylesheet" href = "scripts/bootstrap/css/bootstrap.css">
	<link rel = "stylesheet" href = "scripts/bootstrap/css/bootstrap.min.css">
	<link rel = "stylesheet" href = "scripts/lightbox/dist/css/lightbox.css">
	<link rel = "stylesheet" href = "scripts/magneticpopup/dist/magnific-popup.css">
	<link rel="stylesheet" href="scripts/fontawesome/css/font-awesome.min.css">
	<script src = "scripts/jquery-3.2.1.min.js"></script>

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
			margin-top:50px;
			margin-left:50px;
			padding:0;
			height:300px;
			width:600px;
		}
		.target{
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
			float:left;
			margin-left:25px;
			font-size:80px;
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
		.modal-content{
			-webkit-border-radius: 0px;
			-moz-border-radius: 0px;
			border-radius: 0px; 
		}
		.sign{
			margin-top:45px;
		}
		#categori{
			color:black;
			text-decoration:none;
			font-family:"roboto";
			font-size:30px;

		}
		#search{
			font-family:"roboto";
			font-size:35px;
			padding:0px;
		}
		.dropdown{
			display:inline-block;
			float:right;
			position:relative;
		}
		.dropdown-content{
			display:none;
			position:absolute;
			
		}
		.dropdown-content a{
			color:black;
			text-decoration:none;
			font-family:"roboto";
			font-size:20px;
			display: block;
		}
		.dropdown-content a:hover{
			background-color:gray;
			width:160px;
		}
		.dropdown-content li{
			text-decoration:none;
		}
		.dropdown:hover .dropdown-content {
			display: block;
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
		span.stars, span.stars span {
		display: block;
		background: url(img/star.png) 0 -16px repeat-x;
		width: 80px;
		height: 16px;
		}

		span.stars span {
			background-position: 0 0;
		}
		</style>
	</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12 topmost">
			<div class="col-lg-8">
				<h1 id="headtitle">Artsy<a href="artsy.php" id="menu">Home</a><a href="#" id="menu">About</a><a href="artworks.php" id="menu">Artworks</a></h1>
			</div>
			<div class="col-lg-4">
			<?php
				if(isset($_SESSION['u_id'])){
					$user = $_SESSION['u_first'];
					$userid = $_SESSION['u_id'];
					echo "<span id='welcomeuser'>Welcome, <a href='profile.php' id='profil'>".$user."</a></span>";
				}else{
					echo "<div class='sign'>";
					echo "<a href='#' class='dropdown-toggle' id='signin' data-toggle='modal' data-target='#myModal1'>Sign In</a>";
					echo "<a href='#' class='dropdown-toggle' id='signin' data-toggle='modal' data-target='#myModal'>Sign Up</a>";
					echo "</div>";
				}
			?>
			</div>
			
		</div>
	</div>
</div>   

<div class= "container-fluid target" id="displaydiv" style="background-color:">
	<div class="search">
	<form method="post" action="search.php">
		<span id="categori">Search</span>
		<input id="search1" type="text" name="name">
	</form>
	</div>	
	<div id="searchtarget">
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
<script type="text/javascript">
$x = '';
$id = '';


function datfunction(){
	var $commentsection = $('#commentsection');
	var $name= "<?php echo $user?>";
	var $imgid = $('#imgidbox').val();
	var $userid = "<?php echo $userid?>";
	var $x = $('#commentbox').val();
	
	console.log($x);
	console.log($name);
	console.log($imgid);
	console.log($userid);
	$.ajax({
		type: 'POST',
		url: 'temps/comment.php',
		data: {
			id: $imgid,
			name : $name,
			comment : $x,
			userid : $userid
		},
		success:function(returnedData){
			$commentsection.append("<h1 style='font-size:20px'>"+$name+"</h1><span style='margin-left:20px'>"+$x+"</span>");
		}
	});
}
</script>
<script>
function disfunction(val){
	var $imgid = $('#imgidbox').val();
	var $rate = val;
	var $userid = $id;
	
	$.ajax({
		type: 'POST',
		url: 'rate.php',
		data:{
			id: $imgid,
			rate: $rate,
			userid: $userid
		},
		success:function(data){
			console.log(data);
		}
	});
}
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

