
<form action="faculty_course.php" method="GET">
<div> Faculty ID:<input type="text" size="30" name="fid"></div>
<div> Course ID: <input type="text" size="30" name="cid"></div>
  </form>

  <?php
include ("Repository.php");
class Faculty_course extends Repository{

function addFaculty_course($f_id,$c_id){
$query="INSERT INTO faculty_course set faculty_id='$f_id', course_id='$c_id'";
return $this->query($query);
}

if(isset($_REQUEST['fid'])){
$f_id=$_REQUEST['fid'];
$c_id=$_REQUEST['cid'];

$faculty_course= new abd();
$faculty_course->connect();
$faculty_course->addFaculty_course($f_id, $c_id);




}

?>