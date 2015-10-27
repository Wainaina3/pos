<?php

include_once("adb.php");

class department2 extends adb{

	
function getAllDept(){
		$str="select * from department";
		$result=$this->query($str);
		$data = array();
		if(!$result){
			return false;
		}
		while ($row = $this->fetch()) {

			$row_array['d_id'] = $row['d_id'];
			$row_array['d_name'] = $row['d_name'];
			$row_array['d_head'] = $row['d_head'];
			
			//push the values in the array
			array_push($data,$row_array);
		}
		return $data;
	}


}
	?>