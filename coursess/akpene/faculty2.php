<?php
include_once("adb.php");
class faculty2 extends adb{



function getAllFaculty(){
		$str="select * from faculty";
		$result=$this->query($str);
		$data = array();
		if(!$result){
			return false;
		}
		while ($row = $this->fetch()) {

			$row_array['f_id'] = $row['f_id'];
			$row_array['f_name'] = $row['f_name'];
			
			array_push($data,$row_array);
		}
		return $data;
	}
}
?>