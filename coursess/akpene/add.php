<?php

$num = $_REQUEST['num'];

switch ($num) {
	case 1:
		fcos();
		break;
	
	default:
		echo "sorrry";
		break;
}



function fcos(){
	include ("faculty_course_add2.php");

	$obj = new faculty_course_add2();


	$var=$_REQUEST['cos'];
	$var2=$_REQUEST['tan'];


	$result=$obj->fcAdd($var, $var2);

	if(!$result){
		echo "already exist";
		return;
	}
		echo "done";
	

}







function fdept(){
	include ("faculty_department_add2.php");

	$obj = new faculty_department_add2();


	$var=$_REQUEST['cos'];
	$var2=$_REQUEST['san'];


	$result=$obj->fdAdd($var, $var2);
	if(!$result){
		echo "already exist";
		return;
	}else{
		echo "done";
	}

}


?>