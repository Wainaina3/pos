<?php
include_once("faculty.php");
$id=$_REQUEST['fid'];
$obj=new Faculty();
$obj->deleteFacultyById($id);

header("location:facultyView.php");


?>