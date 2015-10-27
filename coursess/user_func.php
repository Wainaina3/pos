<?php
session_start();
include_once("users.php");

$action = $_REQUEST['act'];

switch ($action) {
	case 1:
	get_user();
	break;
	case 2:
	logout();
	break;
	
	
	
	default:
	echo "Sorry there was an error!";
}


function add_user(){
	
}

function get_user(){
	$name = $_REQUEST['name'];
	$pwd = $_REQUEST['pwd'];
	$obj = new users();	
	$row = $obj->getUser($name, $pwd);
	if(!$row){
		echo '{"res":"error"}';
		return;
	}
	
	$_SESSION['name'] = $row['username'];
	$_SESSION['user_type'] = $row['user_type'];
	if($_SESSION['user_type']!="Admin"){
		echo '{"res":"error"}';
		return;
	}
	// header('location: index.php');
	echo '{"res":"success"}';

	
}

function get_users(){
	$obj = new users();	
	$result=$obj->get_all_users();
	if($result){
		while($row = $obj->fetch()){
			echo $row['username'];
			echo "<br>";
			echo $row['user_type'];
			echo "<br>";
			echo $row['permission'];
			echo "<br>";
		}

	}
}

function logout(){
	session_unset();
	session_destroy();
}

?>