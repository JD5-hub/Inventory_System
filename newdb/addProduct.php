<?php

include "dbclass.php"; 
$database = new Database();

$database->db_connect();
$database->select_db();
$database->addProduct();
$database->db_close();

?>