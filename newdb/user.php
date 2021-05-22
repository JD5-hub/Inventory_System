<?php

class User
{
	private $con;
	protected $_result;
    protected $_row;

	function __construct()
	{
		include_once("./database/db.php");
		$db = new Database();
		$this->con = $db->connect();
	}

	function mysql($query){
        $this->_sql = $query;
    	}

    function myquery(){
        $this->_result = mysql_query($this->_sql);
   	 }

	public function userLogin($email, $password){

    while($this->_row = mysql_fetch_assoc($this->_result)) {

			if ($email == $row['email'] && $password == $row['password']) {

				$_SESSION['userid'] = $row['id'];
				$_SESSION['useremail'] = $row['email'];


					}else{
					return "PASSWORD OR EMAIL NOT MATCHED";
					}
				}
		header('Location: dashboard2.php');
	}
}

?>