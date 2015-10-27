<?php
include("Repository.php");

class Department extends Repository{

function addDept($id, $name, $hod){
$str="insert into DEPARTMENT set Department_Id='$id', Department_Name='$name', Dept_HOD='$hod'";
return $this->query($str);
}

function editDeptHOD($did,$name){
$str="update DEPARTMENT set Dept_HOD='$name' where Department_Id='$did'";
return $this->query($str);
}

function deleteDeptById($did){
	$str="delete from DEPARTMENT where Department_Id='$did'";
	return $this->query($str);
}

function selectDeptByName($name){
	$str="select * from DEPARTMENT where Department_Name like '%$name%'";
	$result=$this->query($str);
	if(!$result){
		return false;
	}
	return $this->fetch();
}

function selectDeptById($did){
	$str="select * from DEPARTMENT where Department_Id='$did'";
	$result=$this->query($str);
	if(!$result){
		return false;
	}
	return $this->fetch();
}

function selectDeptByHOD($hid){
	$str="select * from DEPARTMENT where Dept_HOD='$hid'";
	$result=$this->query($str);
	if(!$result){
		return false;
	}
	return $this->fetch();
}
}
?>