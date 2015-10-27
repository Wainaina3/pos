<?php
include("Repository.php");

class department extends Repository{

	function addDept($id, $name, $hod){
		$str="insert into DEPARTMENT set Department_Id='$id', Department_Name='$name', Dept_HOD='$hod'";
		return $this->query($str);
	}

function updateDept($id, $name, $hod){
		$str="update DEPARTMENT set  Department_Name='$name', Dept_HOD='$hod' where Department_Id='$id'";
		return $this->query($str);
	}

	function deleteDeptById($did){
		$str="delete from DEPARTMENT where Department_Id='$did'";
		return $this->query($str);
	}


function getAllDept(){
		$str="select * from DEPARTMENT";
		$result=$this->query($str);
		$data = array();
		if(!$result){
			return false;
		}
		while ($row = $this->fetch()) {

			$row_array['Department_Id'] = $row['Department_Id'];
			$row_array['Department_Name'] = $row['Department_Name'];
			$row_array['Dept_HOD'] = $row['Dept_HOD'];
			
			//push the values in the array
			array_push($data,$row_array);
		}
		return $data;
	}
	
	function getDeptByName($name){
		$str="select * from DEPARTMENT where Department_Name like '%$name%'";
		$result=$this->query($str);
		$data = array();
		if(!$result){
			return false;
		}
		while ($row = $this->fetch()) {

			$row_array['Department_Id'] = $row['Department_Id'];
			$row_array['Department_Name'] = $row['Department_Name'];
			$row_array['Dept_HOD'] = $row['Dept_HOD'];
			
			//push the values in the array
			array_push($data,$row_array);
		}
		return $data;
	}

	function getDeptById($did){
		$str="select * from DEPARTMENT where Department_Id='$did'";
		$result=$this->query($str);
		$data = array();
		if(!$result){
			echo "error";
			return false;
		}

		while ($row = $this->fetch()) {

			$row_array['Department_Id'] = $row['Department_Id'];
			$row_array['Department_Name'] = $row['Department_Name'];
			$row_array['Dept_HOD'] = $row['Dept_HOD'];
			//push the values in the array
			array_push($data,$row_array);
		}
		return $data;

	}

	function getDeptByHOD($hid){
		$str="select * from DEPARTMENT where Dept_HOD='$hid'";
		$result=$this->query($str);
$data = array();
		if(!$result){
			return false;
		}
		while ($row = $this->fetch()) {

			$row_array['Department_Id'] = $row['Department_Id'];
			$row_array['Department_Name'] = $row['Department_Name'];
			$row_array['Dept_HOD'] = $row['Dept_HOD'];
			
			//push the values in the array
			array_push($data,$row_array);
		}
		return $data;
	}

}


?>