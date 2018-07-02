<?php
	session_start();
	$conn = mysqli_connect("localhost", "root", "", "login");
?>
<div class="container-fluid">
		<?php
			$userid = $_GET['userid'];
			
			$result = mysqli_query($conn,"SELECT * FROM imageuploads WHERE uid_fk='$userid'");
			echo "<div class='row'>";
			while ($row = mysqli_fetch_array($result)) {
				echo "<div class='col-lg-5' style='margin-top:10px;margin-left:10px;padding:0px'>";
					echo "<img style='width:100%;height:auto'  src='temps/uploads/".$row['image']."' >";	
				echo "</div>";
			}
			echo "</div>";
			
		?> 
</div>