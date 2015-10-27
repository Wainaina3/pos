<?php
include_once("base.php");

class users extends base{
	function addUser($username,$email,$pass){
		$password=md5($pass);
		$sql="insert into users set user_name='$username', user_email='$email',password='$pass',status='enabled',
		user_type='regular' ";

		return $this->query($sql);
	}

	function updateUser($emp_id,$username,$pass,$status,$type){
		$password=md5($pass);
		$sql="update users set employee_id='$emp_id',password='$password',status='$status',
		user_type='$type' where user_name='$username'";

		return $this->query($sql);
	}

	function deleteUser($user_name){
		$sql="delete from users where user_name='$user_name'";

		return $this->query($sql);
	}

	function getUserByName($user){
		$sql="select * from users where user_name='$user'";

		if(!$this->query($sql)){
			return false;
		}

		return $this->fetchArray();
	}

	function getUserById($emp_id){
		$sql="select * from users where employee_id='$emp_id'";

		return $this->query($sql);
	}

	function authenticateUser($user,$pass){
		$password=md5($pass);
		$sql="select * from users where user_name='$user' and password='$password'";

		if(!$this->query($sql)){
			return false;
		}

		return $this->fetchArray();
	}
}
?>