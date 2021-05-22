<?php

	$cust_name = $_POST['cust_name'];
	$product = $_POST['product'];
	$price = $_POST['price'];
	$amount = $_POST['amount'];
	$payment_type = $_POST['payment_type'];
	$date = $_POST['order_date'];

	$query = 'INSERT INTO `invoice`'.'(`customer_name`, `product_name`, `product_price`, `amount_paid`, `payment_type`, `order_date`)'.'VALUES("'.$cust_name.'", "'.$product.'", '.$price.', '.$amount.', "'.$payment_type.'", "'.$order_date.'")';

        $retval = mysql_query($query);

        if(!$retval) {
            die('Could not add data: '.mysql_error());
        }

        echo "Data saved successfuly!";
        header('Location: new_order.php');


?>