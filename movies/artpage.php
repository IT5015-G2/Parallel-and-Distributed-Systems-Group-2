<?php
	session_start();
	$conn = mysqli_connect("localhost", "root", "", "login");
?>
<html>
<body>
<head>
<style>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
</style>
</head>
<div class="container-fluid popupajaxart" id="">
	<div class="row">
	<div class="col-lg-7">
		<?php
			$imgid = $_GET['imgid'];
				$total='';
				$conn = mysqli_connect("localhost", "root", "", "login");
				$sql = "SELECT AVG(rating) as total FROM image_rating WHERE img_id_fk = '$imgid'";
				$result=mysqli_query($conn,$sql);
				while($row = mysqli_fetch_assoc($result)){
					echo "<span class='stars'>".$row['total'].".</span>";
					echo "<span style='font-size:20px'> Average: ".round($row['total'],1)."</span>";
				}
				
			$result = mysqli_query($conn,"SELECT * FROM imageuploads WHERE img_id='$imgid'");
			echo "<div class='col-lg-12' id='das'>";
			while ($row = mysqli_fetch_array($result)) {
				echo "<div class='col-lg-12 box' filter ".$row['category'].">";
						echo "<img style='width:100%;height:auto;margin-top:50px;margin-bottom:50px' src='temps/uploads/".$row['image']."' >";
				echo "</div>";
				
			}
			
			echo "</div>";
		?>
	</div>
	<div class="col-lg-5" style="margin-top:50px">
		<?php
			$imgid = $_GET['imgid'];
			if(isset($_SESSION['u_id'])){
				$user = $_SESSION['u_id'];
				$rated = mysqli_query($conn,"SELECT * FROM image_rating WHERE img_id_fk='$imgid' AND uid_fk = '$user'");
			$ratedcheck = mysqli_num_rows($rated);
			}else{
				$ratedcheck = 0;
			}
			
			$result = mysqli_query($conn,"SELECT * FROM imageuploads WHERE img_id='$imgid'");
			
			
			while ($row = mysqli_fetch_array($result)) {
				echo "<div class='startarget'>";
				if($ratedcheck>0){
					while($row1=mysqli_fetch_array($rated)){
						echo "<span style='position:absolute;margin-left:200px'>Your rating: ".$row1['rating']."</span>";
						echo "<span class='stars'>".$row1['rating']."</span>";
					}
				}else if(isset($_SESSION['u_id'])){
					echo		"
							  <form action='' id='starform'>
								<input class='star star-5' id='star-5' type='radio' name='star' value='5' onclick='disfunction(value);'/>
								<label class='star star-5' for='star-5'></label>
								<input class='star star-4' id='star-4' type='radio' name='star' value='4' onclick='disfunction(value);'/>
								<label class='star star-4' for='star-4'></label>
								<input class='star star-3' id='star-3' type='radio' name='star' value='3' onclick='disfunction(value);'/>
								<label class='star star-3' for='star-3'></label>
								<input class='star star-2' id='star-2' type='radio' name='star' value='2' onclick='disfunction(value);'/>
								<label class='star star-2' for='star-2'></label>
								<input class='star star-1' id='star-1' type='radio' name='star' value='1' onclick='disfunction(value);'/>
								<label class='star star-1' for='star-1'></label>
								
							  </form>";
				}else{
					echo "<span>You must log in to rate</span>";
				}
				echo "</div>";
				$artistid = $row['uid_fk'];
				echo "<span id='imgtitle'>".$row['title']."</span>";
				echo "<br>";
				echo "<span style='font-size:15px'>by </span>";
				$result = mysqli_query($conn,"SELECT * FROM users WHERE user_id='$artistid'");
				while($row = mysqli_fetch_array($result)){
				echo "<span id='artist'>".$row['user_first']." ".$row['user_last']."</span>";
				}
			}
		?>

		<hr>
		<div class="row" style="">
		<?php
			$imgid = $_GET['imgid'];
			
			$result = mysqli_query($conn,"SELECT * FROM imageuploads WHERE img_id='$imgid'");
			while ($row = mysqli_fetch_array($result)) {
				echo "<span id='desc'>";
					echo "".$row['description'];
				echo "</span>";
			}
		?>
		</div>
		<hr>
		<div class="row" id="commentsection">
		<span style="font-size:40px;font-family:'ffdin'">Comments</span>
			<?php
				$imgid = $_GET['imgid'];
				
				$result = mysqli_query($conn,"SELECT * FROM image_comments WHERE img_id_fk='$imgid'");
				while ($row = mysqli_fetch_array($result)) {
					if($row>0){
						$userid = $row['uid_fk'];
						$resultid = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$userid'");
						while($row1 = mysqli_fetch_array($resultid)){
							echo "<h1 style='font-size:20px' style='margin-left:20px'>".$row1['user_first']."</h1>";
							echo "<span style='margin-left:20px'>".$row['comment']."</span>";
						}
					}else{
						echo "<span>No comments</span>";
					}
					echo "<hr>";
				}
				
			?>
		</div>
		<hr>
		<div class="row">
		<?php
			if(isset($_SESSION['u_uid'])){
				echo "<div style='height:100px' id='die'>";
				echo "<span id='comment'>Comment</span>";
				echo "<input  id='commentbox' type='text' name='comment' style='width:90%'>";
				echo "<button class='arrowtrig' onclick='datfunction()' data-val='".$_GET['imgid']."' id='submit123' type='submit' style='background-color:transparent; border-color:transparent;' name='submit'>";
					echo "<img src='img/arrow.png'  style='height:20px;'>";
				echo "</button>";
				echo "<input id='imgidbox' type='text' style='display:none' value = '".$_GET['imgid']."'>";
				echo "</div>";
			}else{
				echo "<div style='height:100px'>";
					echo "<span style='margin-bottom:100px'>You must log in to comment</span>";
				echo "</div>";
			}
			echo " <script type='text/javascript'>
					$.fn.stars = function() {
						return $(this).each(function() {
							var val = parseFloat($(this).html());
							var size = Math.max(0, (Math.min(5, val))) * 16;
							var span = $('<span />').width(size);
							$(this).html(span);
						});
					}
					$(function() {
						$('span.stars').stars();
					});
					</script>";
				
		?>
		</div>
	</div>
	</div>
</div>
 
</body>
</html>                                           