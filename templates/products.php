<!-- Modal -->
<div class="modal fade" id="form_products" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new products</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="./newdb/addProduct.php" method="POST">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Date</label>
              <input type="text" class="form-control" name="added_date" id="added_date" value="<?php echo date("Y-m-d"); ?>" readonly/>
            </div>
            <div class="form-group col-md-6">
              <label>Product Name</label>
              <input type="text" class="form-control" name="product_name" placeholder="Enter Product Name" required>
            </div>
          </div>
          <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="category" required/>
              
            <?php

             $servername = "localhost";
             $username = "root";
             $password = "";
             $dbname = "inventory_final";

            $conn = new mysqli($servername, $username, $password, $dbname);
            
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM categories";
            $result = $conn->query($sql);

              while($row = $result->fetch_assoc()) {
                ?>
                <option><?php echo $row['category_name']; ?></option>
             <?php   
              }
            ?>
          
              
            </select>
          </div>
          <div class="form-group">
            <label>Brand</label>
            <select class="form-control"  name="brand" required/>
              
            <?php

             $servername = "localhost";
             $username = "root";
             $password = "";
             $dbname = "inventory_final";

            $conn = new mysqli($servername, $username, $password, $dbname);
            
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM brands";
            $result = $conn->query($sql);

              while($row = $result->fetch_assoc()) {
                ?>
                <option><?php echo $row['brand_name']; ?></option>
             <?php   
              }
            ?>
              
            </select>
          </div>
          <div class="form-group">
            <label>Product Price</label>
            <input type="text" class="form-control" name="product_price" placeholder="Enter Price of Product" required/>
          </div>
          <div class="form-group">
            <label>Quantity</label>
            <input type="text" class="form-control" name="product_qty" placeholder="Enter Quantity" required/>
          </div>
          <button type="submit" class="btn btn-success">Add Product</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>