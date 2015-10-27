<?php
include_once("adb.php");
class faculty_department_add2 extends adb{



function fdAdd($fid,$did){
		$str="INSERT INTO faculty_department set faculty_id='$fid', department_id='$did'";
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