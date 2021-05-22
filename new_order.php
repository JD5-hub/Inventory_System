<?php
include_once("newdb/dbclass.php");
if (!isset($_SESSION['userid'])) {
  header("location:".DOMAIN."/loginPage.php");
}
?>

<?php

  if (isset($_POST['submit'])) {
  
	include_once("./newdb/dbclass.php");
	$db = new Database();

	$db->db_connect();
	$db->select_db();
	$db->updateStock();
	$db->getOrder();
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Order form</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 	<script type="text/javascript" src="./js/order.js"></script>
 </head>
<body>
<div class="overlay"><div class="loader"></div></div>
	<!-- Navbar -->
	<?php include_once("./templates/header.php"); ?>
	<br/><br/>

	<div class="container">
		<div class="row">
			<div class="col-md-10 mx-auto">
				<div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
				  <div class="card-header">
				   	<h4>New Orders</h4>
				  </div>
				  <div class="card-body">
				  	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				  		<div class="form-group row">
				  			<label class="col-sm-3 col-form-label" align="right">Order Date</label>
				  			<div class="col-sm-6">
				  				<input type="text" name="order_date" readonly class="form-control form-control-sm" value="<?php echo date("Y-m-d"); ?>">
				  			</div>
				  		</div>
				  		<div class="form-group row">
				  			<label class="col-sm-3 col-form-label" align="right">Customer Name*</label>
				  			<div class="col-sm-6">
				  				<input type="text" name="cust_name" class="form-control form-control-sm" placeholder="Enter Customer Name" required/>
				  			</div>
				  		</div>

				  		<div class="form-group row">
				  			<label class="col-sm-3 col-form-label" align="right">Product</label>
				  			<div class="col-sm-6">
				  				<select class="form-control" name="product" required/>
				  					<option>Select product</option>
				  					 <?php

            							 $servername = "localhost";
             							 $username = "root";
             							 $password = "";
             							 $dbname = "inventory_final";

            							 $conn = new mysqli($servername, $username, $password, $dbname);
            
            								if ($conn->connect_error) {
              									die("Connection failed: " . $conn->connect_error);
            								}

           								 $sql = "SELECT * FROM products";
           								 $result = $conn->query($sql);

             								 while($row = $result->fetch_assoc()) {
               								 ?>
                								<option><?php echo $row['product_name']; ?></option>
             							<?php   
              								}
            							?>

				  				</select>
				  			</div>
				  		</div>


            <div class="form-group row">
                <label class="col-sm-3 col-form-label" align="right">Product ID</label>
                <div class="col-sm-6">
                  <select class="form-control" name="pID" required/>
                    <option>ID</option>
                     <?php

                           $servername = "localhost";
                           $username = "root";
                           $password = "";
                           $dbname = "inventory_final";

                           $conn = new mysqli($servername, $username, $password, $dbname);
            
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                           $sql = "SELECT * FROM products";
                           $result = $conn->query($sql);

                             while($row = $result->fetch_assoc()) {
                               ?>
                                <option><?php echo $row['pid']; ?></option>
                          <?php   
                              }
                          ?>

                  </select>
                </div>
              </div>


                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" align="right">Price</label>
                      <div class="col-sm-6">
                      <select class="form-control" name="price" required/>	
                        <option>Product Price</option>
				  					 <?php

            							 $servername = "localhost";
             							 $username = "root";
             							 $password = "";
             							 $dbname = "inventory_final";

            							 $conn = new mysqli($servername, $username, $password, $dbname);
            
            								if ($conn->connect_error) {
              									die("Connection failed: " . $conn->connect_error);
            								}

           								 $sql = "SELECT * FROM products";
           								 $result = $conn->query($sql);

             								 while($row = $result->fetch_assoc()) {
               								 ?>

                								<option><?php echo $row['product_price']; ?></option>
             							<?php   
              								}
            							?>
            		</select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="paid" class="col-sm-3 col-form-label" align="right">Amount Paid</label>
                      <div class="col-sm-6">
                        <input type="text" name="amount" class="form-control form-control-sm" required>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="payment_type" class="col-sm-3 col-form-label" align="right">Payment Method</label>
                      <div class="col-sm-6">
                        <select name="payment_type" class="form-control form-control-sm" required/>
                          <option>Cash</option>
                          <option>Card</option>
                          <option>Draft</option>
                          <option>Cheque</option>
                        </select>
                      </div>
                    </div>

                    <center>
                      <input type="submit" name="submit" style="width:150px;" class="btn btn-info" value="Order">
                    </center>


				  	</form>

				  </div>
				</div>
			</div>
		</div>
	</div>
	


</body>
</html>