<?php
if(!isset($_REQUEST['cmd'])){
echo '{"result":0, "message":"Unknown request" }';
exit();
}

$cmd=$_REQUEST['cmd'];

	function getUserById(){
		include("users.php");

		$obj=new user();
		if(isset($_REQUEST['user_id'])){
			$id=$_REQUEST['user_id'];
			
			$row=$obj->getUserById($id);
			if($row){
			echo '{"result":0, "username":"'.$row['user_name'].'","userId":"'.$row['user_id'].'","usertype":"'.$row['user_type'].'","userpass":"'.$row['user_pass'].'"}';
		}
		}
		else{
				echo '{"result":0, "message": "Could not get User"}'; 
		}
		
	}

	function addUser($user_name, $user_id, $user_pass, $user_type){
		include_once("users.php");
		$user=new users();
	if(isset($_REQUEST['user_name'])&& isset($_REQUEST['user_id'])&&isset($_REQUEST['user_pass'])&& isset($_REQUEST['user_type'])){
		$name=$_REQUEST['user_name'];
		$id=$_REQUEST['user_id'];
		$type=$_REQUEST['user_type'];
		$pass=$_REQUEST['user_pass'];

		if($user->addUser($name,$id,$pass,$type)){
			echo '{"result":0, "message": "User succesfully added"}';
		}
		else
			echo '{}';
	}
	}

	function deleteUser($user_id){
		$sql="delete from users where user_id='$user_id'";
		if(!$this->query($sql)){
				echo '"result":0, "message": "Could not delete User"'; 
		}
		else{
				echo '"result":0, "message": "User Deleted"'; 
		}

	}

	function updateUser($user_id, $user_name,$user_pass,$user_type){

		$sql="update users set user_name=$user_name, user_pass=$user_pass, user_type=$user_type";

		if(!$this->query($sql)){
				echo '"result":0, "message": "Could not update User"'; 
		}
		else{
				echo '"result":0, "message": "User Updated"'; 
		}
	}

	function getUsers(){
		$sql="select * from users";

		
	}

	// function searchUser(){
	// 	include("users.php");

	// 	$obj=new user();
	// 	if(isset($_REQUEST['search'])){
	// 		$txt=$_REQUEST['search'];
			
	// 		$row=$obj->searchUsers($txt);
	// 		if($row){
	// 		echo '{"result":0, "username":"'.$row['user_name'].'","userId":"'.$row['user_id'].'","usertype":"'.$row['user_type'].'","userpass":"'.$row['user_pass'].'"}';
	// 	}
	// 	}
	// 	else{
	// 			echo '{"result":0, "message": "Could not get User"}'; 
	// 	}
	// }

	function searchUser(){
	if(!isset($_REQUEST['st'])){
		//return error
		echo '{"result":0,"message": "search did not work."}';
	}
	$txt=$_REQUEST['st'];
	include("users.php");
	$obj=new users();
	if(!$obj->searchUsers($txt)){
		//return error
		echo '{"result":0,"message": "search did not work."}';
		return;
	}
	//at this point the search has been successful. 
	//generate the JSON message to echo to the browser
	$row=$obj->fetch();
	echo '{"result":1,"users":[';	//start of json object
	while($row){
		echo json_encode($row);			//convert the result array to json object
		$row=$obj->fetch();
		if($row){
			echo ",";					//if there are more rows, add comma 
		}
	}
	echo "]}";							//end of json array and object
}

	switch ($cmd) {
		case 1:
			addUser($_REQUEST['user_name'],$_REQUEST['user_id'],$_REQUEST['user_pass'],$_REQUEST['user_type']);
			break;
		case 2:
			updateUser($_REQUEST['user_id'],$_REQUEST['user_name'],$_REQUEST['user_pass'],$_REQUEST['user_type']);
			break;
		case 3:
			delete($_REQUEST['user_id']);
			break;
		case 4:
			searchUser();
			break;
		default:
			# code...
			break;
	}



?>