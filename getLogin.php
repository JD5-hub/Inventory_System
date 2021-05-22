<?php

if (isset($_POST['submit'])) {

  include "newdb/dbclass.php";

  		  $email = $_POST['log_email'];
  		  $password = $_POST['log_password'];

  $db = new Database();
  $db->db_connect();
  $db->select_db();
  $db->mysql('SELECT * FROM users WHERE email = "'.$email.'"');
  $db->myquery();
  $db->getLogin($email, $password);
}

?>