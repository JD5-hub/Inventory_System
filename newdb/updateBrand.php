<?php

	include "dbclass.php"; 
	$database = new Database();

	$database->db_connect();
	$database->select_db();
	$database->updateBrand();
	$database->db_close();

?>