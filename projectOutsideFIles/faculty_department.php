<<<<<<< HEAD
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


}
?>