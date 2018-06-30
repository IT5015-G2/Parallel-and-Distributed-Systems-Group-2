<?php

	require("connect.php"); //$conn

	$query = "SELECT * FROM marvel ";

	$result = mysqli_query($conn, $query);

?>

<html>
	<link rel='stylesheet' href='css/datatables.min.css'>
	<link rel='stylesheet' href='css/bootstrap.min.css'>
<body>
	<h2 style="text-align: center;">MARVEL MOVIES</h2>
<button class="btn btn-default" id="addMovie">Add Movie</button>
</div>
</div>
</div>
	<!-- MODAL FOR ADD MOVIES -->
<div class="modal fade insert" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Add New Movies</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
			<div class="form-group">
				<label>Movie Title</label>
				<input id="movTitle" placeholder='Title' type='text' class='form-control' required="required" autocomplete="off">
			</div>

			<div class="form-group">
				<label>Movie Rating</label>
				<input id="movRating" placeholder='Rating' type='text' class='form-control' required="required" autocomplete="off">
			</div>
			
			<div class="form-group">
				<label>Movie Budget</label>
				<input id="movBudget" placeholder='Budget' type='text' class='form-control' required="required" autocomplete="off">
			</div>	

			<div class="form-group">
				<label>Year released</label>
				<input id="movYear" placeholder='Released' type='text' class='form-control' required="required" autocomplete="off">
			</div>
		
			<div class='text-right'>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        		<button type="submit" class="btn btn-primary" id="button-insert">Submit</button>
			</div>
		</form>
      </div>
      <div class="modal-footer">
        
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

    <div class="container">
        
<div class="row">
<div class='col-md-10 '> 
 
<table id='movieTable' class="table table-hover table-bordered" width="85%">
	<thead>
		<th>Title</th>
		<th>Rating</th>
		<th>Budget</th>
		<th>Year released</th>
		<th>Options</th>
	</thead>
	<tbody>
	<?php
		while($data = mysqli_fetch_assoc($result)){
			echo "<tr>";
			echo "<td>{$data['movie_Title']}</td>";
			echo "<td>{$data['movie_Rating']}</td>";
			echo "<td>{$data['movie_Budget']}</td>";
			echo "<td>{$data['movie_Year']}</td>";
			echo "<td><a href='Edit.php? id={$data['movie_ID']}'><button class='btn btn-warning btn-md' id='EditMovie' name ><span class='glyphicon glyphicon-search'>Edit</span></button> ";
			echo " <a href='delete.php?id={$data['movie_ID']}'><button class='btn btn-danger btn-md' ><span class='glyphicon glyphicon-remove'>Delete
				 </span></button></td></a>";
			echo "</tr>";	
		}
	?>
	</tbody>
</table>
     
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
           <?php

	
        $res =mysqli_query($conn, "SELECT * FROM marvel
                                     WHERE movie_id =17");
        $data = mysqli_fetch_array($res);

            ?>
          <form method ='POST' action= 'Update.php' enctype="multipart/form-data">
                    <input type = 'text' value = '<?php echo $data[0]; ?>' name='id' class='hide' placeholder='id'>
                    <br>
                    <p>Movie Title</p>
                    <input type = 'text' value = '<?php echo $data['movie_Title']; ?>' name='title' class='form-control'>
                    <br>
                    <p>Movie Rating</p>
                    <input type = 'text' value = '<?php echo $data['movie_Rating']; ?>' name='rating' class='form-control'>
                    <br>
                    <p>Year Released</p>
                    <input type = 'text' value ='<?php echo $data['movie_Year']; ?>' name='year' class='form-control'>
                    <br>
                    <p>Budget</p>
                    <input type = 'text' value ='<?php echo $data['movie_Budget']; ?>' name='budget' class='form-control'>
                    <br>
                    <button class = 'btn btn-success pull-right'>SUBMIT</button>
                    <br>
                </form>
        </div>
        <div class="modal-footer">
         
        </div>
      </div>
      
    </div>
  </div>  


</body>
</html>
<script src='js/jquery.min.js'></script>
<script src='js/datatables.min.js'></script>
<script src='js/bootstrap.min.js'></script>
<script>
	$(document).ready(function(){
		$("#movieTable").DataTable();

		$("#addMovie").on("click", function(){

		$(".insert").modal("show");

		$("#button-insert").on("click", function(){


			var movTitle = $("#movTitle").val();
			var movRating = $("#movRating").val();
			var movBudget = $("#movBudget").val();
			var movYear = $("#movYear").val();
		

			$.ajax({
				url : "addMovie.php",
				method : "POST",
				data : {movTitle, movRating, movBudget, movYear},
				success: function(data){
					alert("Added Sucessfully!");
					console.log(data);
				}

			})

		});
	
	});

	});

</script>