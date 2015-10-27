<?php
include("faculty.php");
	$obj=new Faculty();

if(isset($_GET['fid'])){
	$id=$_GET['fid'];
	$name=$_GET['fna'];
	$str="update FACULTY set Faculty_Name='$name' where Faculty_Id='$id'";
	//echo "id=$id  name= $name";
	$re=$obj->query($str);
	if(!$re){
		//die('Updation Failed for the Faculty '.mysql_error());
	}
	else{
		//echo "<br>";
	//	echo "<center><b><font size=4>Updation is Successful on $name</font></b></center>";
		header('location:facultyView.php');
	}
}
else
header('location:facultyView.php');

?>