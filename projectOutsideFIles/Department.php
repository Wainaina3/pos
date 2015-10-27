<?php
include("Repository.php");

class Department extends Repository{

	function addDept($id, $name, $hod){
		$str="insert into DEPARTMENT set Department_Id='$id', Department_Name='$name', Dept_HOD='$hod'";
		return $this->query($str);
	}

	function editDept($id, $name, $hod)){
		$str="update DEPARTMENT set Department_Name='$name', Dept_HOD='$hod' wehre Department_Id='$id'";
		return $this->query($str);
	}

	function deleteDeptById($did){
		$str="delete from DEPARTMENT where Department_Id='$did'";
		return $this->query($str);
	}

	function getDeptByName($name){
		$str="select * from DEPARTMENT where Department_Name like '%$name%'";
		$result=$this->query($str);
		if(!$result){
			return false;
		}
		return $this->fetch();
	}

	function getDeptById($did){
		$str="select * from DEPARTMENT where Department_Id='$did'";
		$result=$this->query($str);
		if(!$result){
			return false;
		}
		return $this->fetch();
	}

	function getDeptByHOD($hid){
		$str="select * from DEPARTMENT where Dept_HOD='$hid'";
		$result=$this->query($str);
		if(!$result){
			return false;
		}
		return $this->fetch();
	}
}
?>