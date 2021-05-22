<?php

	include "dbclass.php"; 
	$database = new Database();

	$database->db_connect();
	$database->select_db();
	$database->deleteBrand();
	$database->db_close();

?>