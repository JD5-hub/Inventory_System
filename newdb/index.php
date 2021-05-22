<?php
include "dbclass.php"; 
$database = new Database();

$database->db_connect();
$database->select_db();
$database->mysql('Select * FROM customer');
$database->myquery();
$database->fetch_array();
$database->db_close();

?>