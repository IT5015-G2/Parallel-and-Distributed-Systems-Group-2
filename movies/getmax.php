<?php
		
		$conn = mysqli_connect("localhost", "root", "", "login");
		$spanimgid= $_POST['spanimgid'];
		$sql = "SELECT MAX(rating) as total FROM image_rating WHERE img_id_fk = '$spanimgid'";
		$result=mysqli_query($conn,$sql);
		$number;
		while($row = mysqli_fetch_assoc($result)){
			$number = $row['total'];
		}
		echo $number;
?>