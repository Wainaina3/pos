<?php

include("department.php");


$action = $_REQUEST['act'];

switch ($action) {
	case 1:
	add_dept();
	break;
	case 2:
	view_dept();
	break;
	case 3:
	get_dept();
	break;
	case 4:
	// $nam = $_REQUEST['did'];
	update_dept();
	break;
	case 5:	
	delete_dept();
	break;
	case 6:	
	get_deptByName();
	break;
	
	
	default:
	echo "Sorry there was an error!";
}



function add_dept(){
	if(($_REQUEST["did"]!="") && ($_REQUEST["dname"]!="") && ($_REQUEST["dhod"]!="") ) {


		$id=$_REQUEST['did'];
		$name=$_REQUEST['dname'];
		$hod=$_REQUEST['dhod'];

		$obj=new Department();
		if(!$obj->addDept($id,$name,$hod)){
			echo  "error adding ".mysql_error();
		}else{
			echo "Data added.";
		}
	}
}

function view_dept(){
		$obj=new Department();
		if(!$obj->getAllDept()){
			echo  "error getting ".mysql_error();
			break;
		}
		echo json_encode($obj->getAllDept());
}

function get_dept(){
	$id = $_REQUEST['did'];
		$obj=new Department();
		if(!$obj->getDeptById($id)){
			echo  "error getting data".mysql_error();
			return;
		}
		echo json_encode($obj->getDeptById($id));

}

function get_deptByName(){
	$name = $_REQUEST['dname'];
		$obj=new Department();
		if(!$obj->getDeptByName($name)){
			echo  "error getting data".mysql_error();
			break;
		}
		echo json_encode($obj->getDeptByName($name));
}

function update_dept(){
		if(($_REQUEST["did"]!="") && ($_REQUEST["dname"]!="") && ($_REQUEST["dhod"]!="") ) {


		$id=$_REQUEST['did'];
		$name=$_REQUEST['dname'];
		$hod=$_REQUEST['dhod'];

		$obj=new Department();
		if(!$obj->updateDept($id,$name,$hod)){
			echo  "error updating ".mysql_error();
		}else{
			echo "Data Updated.";
		}
	}
}

function delete_dept(){
		$id = $_REQUEST['did'];
		
		$obj=new Department();
		if($obj->deleteDeptById($id)){
			return true;
		}
			return false;
	}


?>