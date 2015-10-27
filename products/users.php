<?php
include_once("adb.php");

class users extends adb{

	function getUserById($id){

		$sql="select user_id, user_name, user_type from users where user_id='$id'";

		 if(!$this->query($sql)){
		 return false; 
		 
		 }
		 else{ 
		 	return $this->fetch();
		 	
		 	}
	}

	function addUser($user_name, $user_id, $user_pass, $user_type){
		$sql="insert into users set user_name='$user_name',user_id='$user_id',user_pass='$user_pass',user_type='$user_type'";

		if(!$this->query($sql)){
				return false;
		}
		else{
				return true; 
		}
	}

	function deleteUser($user_id){
		$sql="delete from users where user_id='$user_id'";
		if(!$this->query($sql)){
				return false; 
		}
		else{
				return true; 
		}

	}

	function updateUser($user_id, $user_name,$user_pass,$user_type){

		$sql="update users set user_name=$user_name, user_pass=$user_pass, user_type=$user_type";

		if(!$this->query($sql)){
				return false; 
		}
		else{
				return true; 
		}
	}

	function getUsers(){
		$sql="select * from users";

		If(!$this->query($sql)){
			return false;
		}

		else{
			return true;
		}


	}

	function searchUsers($txt){
		$sql="select * from users where user_name like '%$txt%' or user_type like '%$txt%'  or user_id like '%$txt%'";

		If(!$this->query($sql)){
			return false;
		}

		else{
			return true;
		}

	}

	
}

?>