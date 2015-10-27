<?php
	include("faculty.php");
	$obj=new Faculty();
	if(isset($_GET['fid'])){
	$id=$_GET['fid'];
	$name=$_GET['fna'];

	if(!$obj->addFacultyDetail($id,$name)){
		echo "Error in Adding faculty ".mysql_error();
	}
	else{
		echo "Successful in adding $name";
		//header('location:faculView.php');
	}
}
	?>