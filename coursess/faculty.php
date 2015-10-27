<?php
include("Repository.php");

class Faculty extends Repository{

function Faculty(){

}

function addFacultyDetail($id,$name){
	$str="insert into FACULTY set Faculty_Name='$name',Faculty_Id='$id'";
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

function select(){
	$str="select * from FACULTY";
	$result=$this->query($str);
	if(!$result){
		return false;
	}
	return true;
}
function search($txt){
	$str="select * from faculty where faculty_id like '%$txt%' or faculty_Name like '%$txt%'";
	$result=$this->query($str);
	if(!$result){
		return false;
	}
	
	return true;


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