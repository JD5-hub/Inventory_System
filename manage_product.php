<?php
include_once("newdb/dbclass.php");
if (!isset($_SESSION['userid'])) {
	header("location:".DOMAIN."/loginPage.php");
}

  	 	 		
  	 	 		//-----=======FOR UPDATE AND DELETE FORM-------=======

		        	if(isset($_POST['p-update-submit'])) {
		        		include_once("./newdb/dbclass.php");
		        		$db = new Database();
						$db->db_connect();
						$db->select_db();
						$db->updateProduct();
					   }

					elseif(isset($_POST['p-delete-submit'])) {
						include_once("./newdb/dbclass.php");
						$db = new Database();
						$db->db_connect();
						$db->select_db();
						$db->deleteProduct();
						$db->db_close();
					   }
		        ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Inventory Management System</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 	<link rel="stylesheet" type="text/css" href="forModal.css">
 	<script type="text/javascript" src="./js/manage.js"></script>
 </head>
<body>
	<!-- Navbar -->
	<?php include_once("./templates/header.php"); ?>
	<br/><br/>

	<style type="text/css">
		#delBtn {
 			 	margin-left: 9.60%;
			}
	</style>

	<button id="delBtn"  class="btn btn-danger btn-sm">Delete</button>
	<button id="upBtn" class="btn btn-info btn-sm">Edit</button>
	<br>

	<div class="container">
		<table class="table table-hover table-bordered">
		    <thead>
		      <tr>
		        <th>Product ID</th>
		        <th>Product Name</th>
		        <th>Category</th>
		        <th>Brand</th>
		        <th>Price</th>
		        <th>Stock</th>
		        <th>Date added</th>
		      </tr>
		    </thead>
		    <tbody>
		      
		    	<?php

		        include_once("./newdb/dbclass.php");

		    	$db = new Database();

				$db->db_connect();
				$db->select_db();
				$db->mysql('Select * FROM products');
				$db->myquery();
				$db->fetchProducts();
				$db->db_close();

		        	?>

		    </tbody>
		  </table>
	</div>

	<!-- Delete Modal -->
<div id="delModal" class="del-modal">

  <!-- Modal content -->
  <div class="modal-content">
  	 <div class="card-body">

		        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		          <div class="form-group">
		            <label for="username">Enter ID number of the Product you wish to delete</label>
		            <input type="text" name="pID" class="form-control" id="username" placeholder="Enter ID number">
		            <small id="u_error" class="form-text text-muted"></small>
		          </div>
		          
		          <button type="submit" name="p-delete-submit" class="btn btn-primary"><span class="fa fa-trash"></span>&nbsp;Delete</button>
		        </form>
		         <span class="close">&times;</span>
</div>
</div>

<script>

	var delmodal = document.getElementById("delModal");
	var btn1 = document.getElementById("delBtn");
	var span1 = document.getElementsByClassName("close")[0];

	btn1.onclick = function() {

  delmodal.style.display = "block";
}

span1.onclick = function() {
  delmodal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal1) {
    delmodal.style.display = "none";
  }
}
</script>
</div> 

<!-- Update Modal -->
<div id="upModal" class="up-modal">

  <!-- Modal content -->
  <div class="modal-content">
  	 <div class="card-body">

		        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		          <div class="form-group">
		            <label for="username">Enter ID number of the Product you wish to Update</label>
		            <input type="text" name="pID" class="form-control" id="username" placeholder="Enter ID number">
		            <small id="u_error" class="form-text text-muted"></small>
		          </div>

		          <div class="form-group">
		            <label for="username">Change Product name</label>
		            <input type="text" name="pName" class="form-control" id="username" placeholder="Enter new Product name">
		            <small id="u_error" class="form-text text-muted"></small>
		          </div>

		          <div class="form-group">
		            <label for="username">Change Category</label>
		            <input type="text" name="pCategory" class="form-control" id="username" placeholder="Enter new category">
		            <small id="u_error" class="form-text text-muted"></small>
		          </div>

		          <div class="form-group">
		            <label for="username">Change Brand</label>
		            <input type="text" name="pBrand" class="form-control" id="username" placeholder="Enter new brand">
		            <small id="u_error" class="form-text text-muted"></small>
		          </div>

		          <div class="form-group">
		            <label for="username">Change Price</label>
		            <input type="text" name="pPrice" class="form-control" id="username" placeholder="Enter new price">
		            <small id="u_error" class="form-text text-muted"></small>
		          </div>
		          
		          <button type="submit" name="p-update-submit" class="btn btn-primary"><span class="fa fa-undo"></span>&nbsp;Update</button>
		        </form>
		        <span class="closeUpdate">&times;</span>

  </div>
   </div>
</div>


<script>

	var modal = document.getElementById("upModal");
	var btn = document.getElementById("upBtn");
	var span = document.getElementsByClassName("closeUpdate")[0];

	btn.onclick = function() {

  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

	<?php
		include_once("./templates/update_products.php");
	?>
	
	
</body>
</html>