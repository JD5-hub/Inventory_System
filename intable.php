<?php
include_once("newdb/dbclass.php");
if (!isset($_SESSION['userid'])) {
  header("location:".DOMAIN."/loginPage.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>INVENTORY-PRODUCTS</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css2/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<?php include_once("./templates/header.php"); ?>
</head>

<body id="page-top">
  <div id="wrapper">
   

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-header py-3">

                <a href="intable.php" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-boxes"></i>
                    </span>
                    <span class="text" style="background-color: rgb(108,108,108); font-weight: bold;">Products</span>
                  </a>

                  <a href="invoiceTable.php" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-file-invoice-dollar"></i>
                    </span>
                    <span class="text" style="background-color: rgb(108,108,108); font-weight: bold;">Invoice</span>
                  </a>

                </br>
                </br>

                  <h3 class="m-0 font-weight-bold text-primary">Product Details</h3>

                  <table class="table table-bordered" width="10%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Total Stocks</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php
                        include_once("newdb/dbclass.php");
                      
                        $db = new Database();
                        $db->db_connect();
                        $db->select_db();
                        $db->mysql('SELECT * FROM products');
                        $db->myquery();
                        $db->getAllStocks();
                        $db->db_close();
                    ?>

                    </tbody>
                  </table>

            </div>
            <div class="card-body">
              <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>PRODUCT NAME</th>
                      <th>PRICE</th>
                      <th>STOCK</th>
                      <th>DATE ADDED</th>
                    </tr>
                  </thead>
                  <tbody>

 <?php

  include_once("newdb/dbclass.php");
  $db = new Database();
  $db->db_connect();
  $db->select_db();
  $db->mysql('SELECT * FROM products');
  $db->myquery();
  $db->getProducts();

?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Malaguia_Peralta 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js2/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js2/demo/datatables-demo.js"></script>

</body>

</html>
