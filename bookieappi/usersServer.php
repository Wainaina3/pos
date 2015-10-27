<?php
include_once("adb.php");

public class users extends adb{

	//authenticates a user
	public function authenticate($user_email,$user_pass){
		$sql_users="select * from users where email=$user_email
		and password=$user_pass";

		if($this->query($sql_users)){
			$dataset=$this->fetch();
			if(empty($dataset['email']) or empty($dataset['password'])){
				return false;
			}
			
		}
		return true;
	}

	//creates a user
	public function create_user($first_name, $last_name, $email, $password){
		$sql_user="insert into users set first_name=$first_name,last_name=
		$last_name, email=$email,password=$password";

		return $this->query($sql_user);

	}

	//update password
	public function update_password($email,$new_password){
		$sql_update="update users set password=$new_password where email=$email";
		
		return $this->query($sql_update);
	}
}

?>