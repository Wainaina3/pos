<?php
include_once("adb.php");
class faculty_course_add2 extends adb{



function fcAdd($fid,$cid){
		$str="INSERT INTO faculty_course set faculty_id='$fid', course_id='$cid'";
		$result=$this->query($str);
		if(!$result){
			return false;
		}
		else{
			return true;
		}
}
}
?>