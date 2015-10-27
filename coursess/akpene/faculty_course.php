<?php

include_once 'adb.php';
class Faculty_course extends adb{

function addFaculty_course($f_id,$c_id){
$query="INSERT INTO faculty_course set faculty_id=$f_id, course_id=$c_id";
return $this->query($query);
}

function viewFaculty_course(){
 $query="SELECT * FROM faculty 
  inner join faculty_course on faculty.Faculty_Id = faculty_course.faculty_id inner 
  join course_outline on faculty_course.course_id= course_outline.course_id ";

// "select * from faculty_course inner join course_outline on faculty_course.course_id=course_outline.course_id";
$sql= "select * from faculty_course inner join course_outline on faculty_course.course_id=course_outline.course_id inner join faculty on faculty_course.faculty_id=faculty.faculty_id";

 return $this->query($sql);
}


}
?>