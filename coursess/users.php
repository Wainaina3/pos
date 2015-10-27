<?php
include("Repository.php");

/**
* 
*/
class users extends Repository
{
	
	function __construct(){}

	function addUser($name, $type, $pwd, $per){
		$str = "insert into users set username='$name', user_type='$type',pword = md5($pwd), permission='$per'";
		return $this->query($str);
	}
	
	function getUser($name, $pwd){

		$str = "select user_id, username, user_type, permission from users where username='$name'and pword=md5($pwd)";

		if(!$this->query($str)){
			return false;
		}
		return $this->fetch();
	}

	function get_all_users(){
		$str = "select user_id, username, user_type, permission from users";

		if(!$this->query($str)){
			return false;
		}
		return true;
	}


}

// echo "asdfasd";

// $obj = new users();
// $result=$obj->get_all_users();
// $row = $obj->getUser("dan");

// $obj->addUser("dan","Admin",1234,"add");
// echo "asdf";
// if($result){
	// while($row = $obj->fetch()){
		// echo $row['username'];
		// echo "<br>";
		// echo $row['user_type'];
		// echo "<br>";
		// echo $row['permission'];
		// echo "<br>";
	// }

// }


?>