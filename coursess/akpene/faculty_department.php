<<<<<<< HEAD
<?php

include_once 'adb.php';
class Faculty_department extends adb{

function addFaculty_department($f_id,$d_id){
$query="INSERT INTO faculty_department set faculty_id=$f_id, department_id=$d_id";
return $this->query($query);
}

function viewFaculty_department($f_id,$d_id){
 $query="SELECT from faculty_department where faculty_id=$f_id and department_id=$d_id";
 return $this->query($query);
}

function updateFaculty_department($f_id,$d_id){
 $query="UPDATE faculty_department set faculty_id=$f_id and department_id=$d_id";
 return $this->query($query);
}

function deleteFaculty_department($f_id,$d_id){
 $query="DELETE from faculty_department where faculty_id=$f_id and department_id=$d_id";
 return $this->query($query);
}

}
=======
<form action="faculty_department.php" method="GET">
<div> Faculty ID:<input type="text" size="30" name="fid"></div>
<div> Department ID: <input type="text" size="30" name="did"></div>
  </form>

  <?php
include ("Repository.php");
class Faculty_department extends Repository{

function addFaculty_department($f_id,$d_id){
$query="INSERT INTO faculty_department set faculty_id='$f_id', course_id='$d_id'";
return $this->query($query);
}

if(isset($_REQUEST['fid'])){
$f_id=$_REQUEST['fid'];
$d_id=$_REQUEST['did'];

$faculty_department= new abd();
$faculty_department->connect();
$faculty_department->addFaculty_department($f_id, $d_id);


>>>>>>> derrick
?>