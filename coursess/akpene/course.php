<?php
	
	include_once("adb.php");
class course extends adb{


		function getAllCourse(){
		$str="select * from course";
		$result=$this->query($str);
		$data = array();
		if(!$result){
			return false;
		}
		while ($row = $this->fetch()) {

			$row_array['c_id'] = $row['c_id'];
			$row_array['c_name'] = $row['c_name'];
			
			array_push($data,$row_array);
		}
		return $data;
	}
}
	
	?>