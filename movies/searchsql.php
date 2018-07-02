<?php
session_start();

$name=$_POST['name']; 

			  $conn = mysqli_connect("localhost", "root", "", "login");

			  $name = mysqli_real_escape_string($conn,$name);
			  
			  echo "<div class='col-lg-6'>";
			  
			  echo "<h1>Images</h1>";
			  
			  $sql="SELECT * FROM imageuploads WHERE title LIKE '%".$name."%'";

			  $result=mysqli_query($conn,$sql); 
			  
			  $resultCheck = mysqli_num_rows($result);
			  
			  if($resultCheck>0){
					while ($row = mysqli_fetch_array($result)) {
						echo "<hr>";
							echo "<a href='artpage.php?imgid=".$row['img_id']."' class='box' style='padding:0px;margin-left:20px'>";
								echo "<span>".$row['title']." by <span>";
									$result1 = mysqli_query($conn,"SELECT * FROM users WHERE user_id='".$row['uid_fk']."'");
									while($row1 = mysqli_fetch_array($result1)){
										echo "<span>".$row1['user_first'];
									}
							echo "</a>";
						echo "</hr>";
					}
			  }else{
				  echo "nothing found";
			  }
			  
			  echo "</div>";
			  
			  echo "<div class='col-lg-6'>";
			echo "<h1>Users</h1>";
					$sql = "SELECT * FROM users WHERE user_first LIKE '%".$name."%' OR user_last LIKE '%".$name."%'";
						$result=mysqli_query($conn,$sql); 
						$resultCheck = mysqli_num_rows($result);
						if($resultCheck>0){
							while($row = mysqli_fetch_array($result)){
								echo "<hr>";
									echo "<a href='userimagespage.php?userid=".$row['user_id']."' class='userbox'>".$row['user_first']." ".$row['user_last']."</a>";
							}
						}else{
							echo "nothing found";
						}
			  echo "</div>";
			  echo "<script>
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
				</script>";
				echo "<script>
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
					</script>";
				
?>