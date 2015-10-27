<?php
include_once("adb.php");

class users extends adb{

	function getUserById($id){

		$sql="select user_id, user_name, user_type, permission from users where user_id=$id";

		 if(!$this->query($sql))
		 	return false;
		 else 
		 	return true;
	}		
}


?>