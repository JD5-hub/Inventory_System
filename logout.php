<?php

include_once("newdb/dbclass.php");
if (isset($_SESSION["userid"])) {
	session_destroy();
}
header("location:".DOMAIN."/loginPage.php");

?>