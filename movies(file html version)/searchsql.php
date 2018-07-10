<?php
session_start();

$name=$_POST['name']; 

			  $conn = mysqli_connect("localhost", "root", "", "movies");

			  $name = mysqli_real_escape_string($conn,$name);
			  
			  echo "<div class='col-lg-6'>";
			  
			  
			  $sql="SELECT * FROM movies WHERE movie_title LIKE '%".$name."%'";

			  $result=mysqli_query($conn,$sql); 
			  
			  $resultCheck = mysqli_num_rows($result);
			  
			  if($resultCheck>0){
					while ($row = mysqli_fetch_array($result)) {
							echo "<a href='moviepage.php?movie_id=".$row['movie_id']."' class='box'>";
								echo "<span>".$row['movie_title']."<span>";
							echo "</a>";
							echo "<br>";
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