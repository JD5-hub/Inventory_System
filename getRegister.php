  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 	<link rel="stylesheet" type="text/css" href="./includes/style.css">

<?php

		include "newdb/dbclass.php";

		$db = new Database();
		$db->db_connect();
		$db->select_db();
		$db->getRegister();
?>
</br>
        <h4>New user registered successfully!</h4>
	<button type="submit" onclick="window.location.href='loginPage.php';" name="user_register" class="btn btn-primary"><span class="fa fa-user"></span>&nbsp;Go to login page</button>