<?php

session_start();
define("DOMAIN","http://localhost/inventory/public_html");

class Database{
    const DB_HOSTNAME = 'localhost';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';
    const DB_NAME = 'inventory_final';

    protected $_db_connect;
    protected $_sql;
    protected $_result;
    protected $_row;

    function db_connect(){
        $this->_db_connect = mysql_connect(self::DB_HOSTNAME,self::DB_USERNAME,self::DB_PASSWORD) or die(mysql_error());
    }

    function select_db(){
        mysql_select_db(self::DB_NAME) or die(mysql_error());
    }

    function mysql($query){
        $this->_sql = $query;
    }

    function myquery(){
        $this->_result = mysql_query($this->_sql);
    }


    function getRegister() {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $pw = $_POST['password'];
        $uType = $_POST['usertype'];

        if(empty($name) || empty($email) || empty($pw) || empty($uType)) {
            echo "Fields cannot be empty!";
        }
        else {

            $query = 'INSERT INTO `users`'.'(`name`, `email`, `password`, `type`)'.'VALUES('.'"'.$name.'","'.$email.'"'.',"'.$pw.'","'.$uType.'")';
    
        $retval = mysql_query($query);

        if(!$retval) {
            die('Could not add data: '.mysql_error());
        }
    }
}

function getLogin($email, $password) {

    while($this->_row = mysql_fetch_assoc($this->_result)) {
        
        $dbID = $this->_row['id'];
        $dbEmail = $this->_row['email'];
        $dbPassword = $this->_row['password'];

        if($email == $dbEmail && $password == $dbPassword) {

                $_SESSION['userid'] = $dbID;
                $_SESSION['useremail'] = $dbEmail;
                header('Location: ./dashboard2.php');
          }
          else {
            echo "Invalid email or passwrord!";
          }

    }
}


    function fetchCategories() {
        while($this->_row = mysql_fetch_assoc($this->_result)) {

            $catID = $this->_row['cid'];
            $catName = $this->_row['category_name'];

            echo  "<tr>";
            echo "<td>".$catID."</td>";
            echo "<td>".$catName."</td>";
            echo  "</tr>";
        }
    }


    function addCategory() {
        $catName = $_POST['category_name'];

        $query = 'INSERT INTO `categories`'.'(`category_name`)'.'VALUES('.'"'.$catName.'"'.')';
        $retval = mysql_query($query);

        if(!$retval) {
            die('Could not add data: '.mysql_error());
        }
        header('Location: ../dashboard2.php');

    }

    function deleteCategory() {
        $catID = $_POST['catID'];

        $query = 'DELETE FROM `categories` WHERE `cid` = '.$catID;
        $retval = mysql_query($query);

        if(!$retval) {
            die('Could not delete data: '.mysql_error());
        }
        header('Location: ./manage_categories.php');

    }

    function updateCategory() {
        $catID = $_POST['catID'];
        $catName = $_POST['catName'];

        $query = 'UPDATE `categories` SET `category_name` = "'.$catName.'" WHERE `cid` = '.$catID;
        $retval = mysql_query($query);

        if(!$retval) {
            die('Could not update data: '.mysql_error());
        }
        header('Location: ./manage_categories.php');

    }

    function updateCategoryForProducts() {
        $catName = $_POST['catName'];

        $query = 'UPDATE `products` SET `p_category` = "'.$catName.'"';
        $retval = mysql_query($query);

        if(!$retval) {
            die('Could not update data: '.mysql_error());
        }
        header('Location: ./manage_categories.php');

    }

    //------------=========FETCHING BRANDS DATA FROM DATABASE AND INSERTING IT TO THE TABLE================-------------

    function fetchBrands() {
        while($this->_row = mysql_fetch_assoc($this->_result)) {

             $brandID = $this->_row['brand_id'];
             $brandName = $this->_row['brand_name'];

            echo "<tr>";
            echo "<td>".$brandID."</td>";
            echo "<td>".$brandName."</td>";
            echo "</tr>";
    }
}

        //------------=========ADDING DATA TO THE `BRANDS` TABLE IN THE DATABASE================-------------

    function addBrand() {
        $bName = $_POST['brand_name'];

        $query = 'INSERT INTO `brands`'.'(`brand_name`)'.'VALUES('.'"'.$bName.'"'.')';
        $retval = mysql_query($query);

        if(!$retval) {
            die('Could not add data: '.mysql_error());
        }
        header('Location: ../dashboard2.php');
    }


        //------------=========DELETING DATA FROM THE `BRANDS` TABLE IN THE DATABASE================-------------

    function deleteBrand() {
        $brandID = $_POST['brandID'];
        $query = 'DELETE FROM `brands` WHERE `brand_id` = '.$brandID;

        $retval = mysql_query($query);

        if(!$retval) {
            die('Could not delete data: '.mysql_error());
        }
        header('Location: ./manage_brand.php');

    }



    //------------=========UPDATING DATA FROM THE `BRANDS` TABLE IN THE DATABASE================-------------

    function updateBrand() {
        $brandID = $_POST['brandID'];
        $brandName = $_POST['brandName'];

        $query = 'UPDATE `brands` SET `brand_name` = "'.$brandName.'" WHERE `brand_id` = '.$brandID;
        $retval = mysql_query($query);

        if(!$retval) {
            die('Could not update data: '.mysql_error());
        }
        header('Location: ./manage_brand.php');

    }

    // function updateBrandForProducts() {
    //     $brandName = $_POST['brandName'];

    //     $query = 'UPDATE `products` SET `p_brand` = "'.$brandName.'" WHERE `p_brand` LIKE "%'.$brandName.'%"';
    //     $retval = mysql_query($query);

    //     if(!$retval) {
    //         die('Could not update data: '.mysql_error());
    //     }

    // }



    //------------=========ADDING A NEW PRODUCT TO THE DATABASE================-------------

    function addProduct() {
        $pname = $_POST['product_name'];
        $pcategory = $_POST['category'];
        $pbrand = $_POST['brand'];
        $pprice = $_POST['product_price'];
        $pqty = $_POST['product_qty'];
        $pdate = $_POST['added_date'];

        $query = 'INSERT INTO `products`'.'(`product_name`, `p_category`, `p_brand`, `product_price`, `product_stock`, `added_date`)'.'VALUES('.'"'.$pname.'", "'.$pcategory.'", "'.$pbrand.'", "'.$pprice.'", "'.$pqty.'", "'.$pdate.'")';

        $retval = mysql_query($query);

        if(!$retval) {
            die('Could not add data: '.mysql_error());
        }
        header('Location: ../dashboard2.php');

    }



//------------=========FETCHING PRODUCTS FROM DATABASE AND DISPLAYING THEM TO THE PRODUCT MANAGER TABLE================-------------

    function fetchProducts() {
        while($this->_row = mysql_fetch_assoc($this->_result)) {

            $pID = $this->_row['pid'];
            $pName = $this->_row['product_name'];
            $pCat = $this->_row['p_category'];
            $pBrand = $this->_row['p_brand'];
            $pPrice = $this->_row['product_price'];
            $pQty = $this->_row['product_stock'];
            $pDate = $this->_row['added_date'];

            echo  "<tr>";
            echo "<td>".$pID."</td>";
            echo "<td>".$pName."</td>";
            echo "<td>".$pCat."</td>";
            echo "<td>".$pBrand."</td>";
            echo "<td>".$pPrice."</td>";
            echo "<td>".$pQty."</td>";
            echo "<td>".$pDate."</td>";
            echo  "</tr>";
        }
    }

            //------------=========DELETING DATA FROM THE `PRODUCTS` TABLE IN THE DATABASE================-------------

    function deleteProduct() {
        $pID = $_POST['pID'];
        $query = 'DELETE FROM `products` WHERE `pid` = '.$pID;

        $retval = mysql_query($query);

        if(!$retval) {
            die('Could not delete data: '.mysql_error());
        }
        header('Location: ./manage_product.php');

    }


            //------------=========UPDATING DATA FROM THE `PRODUCTS` TABLE IN THE DATABASE================-------------

    function updateProduct() {
        $pID = $_POST['pID'];
        $pName = $_POST['pName'];
        $pCat = $_POST['pCategory'];
        $pBrand = $_POST['pBrand'];
        $pPrice = $_POST['pPrice'];

        $query = 'UPDATE `products` SET `product_name` = "'.$pName.'", `p_category` = "'.$pCat.'", `p_brand` = "'.$pBrand.'", `product_price` = '.$pPrice.' WHERE `pid` = '.$pID.'';

        $retval = mysql_query($query);

        if(!$retval) {
            die('Could not update data: '.mysql_error());
        }
        header('Location: ./manage_product.php');

    }

    function getOrder() {
        $cust_name = $_POST['cust_name'];
        $pName = $_POST['product'];
        $price = $_POST['price'];
        $amount = $_POST['amount'];
        $payment_type = $_POST['payment_type'];
        $date = $_POST['order_date'];

        $query = 'INSERT INTO `invoice`'.'(`customer_name`, `product_name`, `product_price`, `amount_paid`, `payment_type`, `order_date`)'.'VALUES("'.$cust_name.'", "'.$pName.'", '.$price.', '.$amount.', "'.$payment_type.'", "'.$date.'")';

        $retval = mysql_query($query);

        if(!$retval) {
            die('Could not add data: '.mysql_error());
        }

        header('Location: new_order.php');
    }

    public function updateStock() {
        $pID = $_POST['pID'];

        $query = 'SELECT product_stock FROM products WHERE pid = "'.$pID.'"';
        $this->mysql($query);
        $result = $this->myquery();

            while($this->_row = mysql_fetch_assoc($this->_result)) {
                $curStock = $this->_row['product_stock'];
                $newStock = $curStock-1;
                
           $retval = mysql_query('UPDATE products SET product_stock = '.$newStock.' WHERE pid = "'.$pID.'"');

        if(!$retval) {
            die('Could not do operation: '.mysql_error());
        }

    }
}

function getInvoice() {
    while($this->_row = mysql_fetch_assoc($this->_result)) {

        $cName = $this->_row['customer_name'];
        $pName = $this->_row['product_name'];
        $pPrice = $this->_row['product_price'];
        $amount = $this->_row['amount_paid'];
        $pType = $this->_row['payment_type'];
        $oDate = $this->_row['order_date'];

        echo  "<tr>";
          echo "<td>".$cName."</td>";
          echo "<td>".$pName."</td>";
          echo "<td>".$pPrice."</td>";
          echo "<td>".$amount."</td>";
          echo "<td>".$pType."</td>";
          echo "<td>".$oDate."</td>";
          echo  "</tr>";
    }
}

function solveIncome() {
    $sum = 0;
    while($this->_row = mysql_fetch_assoc($this->_result)) {
        $sum+=$this->_row['amount_paid'];
    }
        echo "<tr>";
        echo "<td>Php ".$sum."</td>";
        echo "</tr>";
}

function getProducts() {
    while($this->_row = mysql_fetch_assoc($this->_result)) {
        $pName = $this->_row['product_name'];
        $pPrice = $this->_row['product_price'];
        $pStock = $this->_row['product_stock'];
        $aDate = $this->_row['added_date'];

        echo  "<tr>";
          echo "<td>".$pName."</td>";
          echo "<td>Php ".$pPrice."</td>";
          echo "<td>".$pStock."</td>";
          echo "<td>".$aDate."</td>";
          echo  "</tr>";
    }
}

function getAllStocks() {
    $sum = 0;
    while($this->_row = mysql_fetch_assoc($this->_result)) {
        $sum+=$this->_row['product_stock'];
    }
        echo "<tr>";
        echo "<td>".$sum." items</td>";
        echo "</tr>";
}

    function db_close(){
        mysql_close($this->_db_connect);
    }

}

?>