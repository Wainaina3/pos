<?php
include("Repository.php");

class Faculty extends Repository{

function Faculty(){

}

function addFacultyName($name){
$str="insert into FACULTY set Faculty_Name='$name'";
return $this->query($str);
}

function addFacultyId($id){
$str="insert into FACULTY set Faculty_Id='$id'";
return $this->query($str);
}

function editFacultyName($id,$name){
$str="update FACULTY set Faculty_Name='$name' where Faculty_Id='$id'";
return $this->query($str);
}

function deleteFacultyById($id){
	$str="delete from FACULTY where Faculty_Id='$id'";
	return $this->query($str);
}

function selectFacultyByName($name){
	$str="select * from FACULTY where Faculty_Name like '%$name%'";
	$result=$this->query($str);
	if(!$result){
		return false;
	}
	return $this->fetch();
}

function selectFacultyById($id){
	$str="select * from FACULTY where Faculty_Id='$id'";
	$result=$this->query($str);
	if(!$result){
		return false;
	}
	return $this->fetch();
}
}
?>