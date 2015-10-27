<?php
include("Repository.php");
class course_outline extends Repository{

/*Methods for the department table*/
public function addDeptID($did){
	$this->connect();

	$result->$this->query("insert into Department set department_id='$did'");

	if(!$result){
		return false;
	}
	return $result;
}

public function addDeptName($name){
	$this->connect();

	$result->$this->query("insert into Department set department_name='$name'");

	if(!$result){
		return false;
	}
	return $result;
}

public function addDeptHOD($Hid){
	$this->connect();

	$result->$this->query("insert into Department set Dept_HOD='$Hid'");

	if(!$result){
		return false;
	}
	return $result;
}

public function getDeptByID($did){
	$this->connect();

	$result=$this->query("Select * from DEPARTMENT where department_id='$did'");

	if(!$result){
		return false;
	}

	return $this->fetch();
}

public function getDeptByName($name){
	$this->connect();

	$result=$this->query("select * from DEPARTMENT where Department_name like '%$name%'");

	if(!$result){
		return false;
	}

	return $this->fetch();
}

public function getDeptByHOD_Id($id){
	$this->connect();

	$result=$this->query("select * from DEPARTMENT where Dept_HOD = '$id'");

	if(!$result){
		return false;
	}

	return $this->fetch();
}
/*End of dept functions*/

/*Methods for the Faculty Table*/
public function addFacultyName($name){
	$this->connect();

	$result->$this->query("insert into Faculty set faculty_name='$name'");

	if(!$result){
		return false;
	}
	return $result;
}

public function addFacultyId($fid){
	$this->connect();

	$result->$this->query("insert into Faculty set faculty_id='$fid'");

	if(!$result){
		return false;
	}
	return $result;
}
public function getFacultyById($id){
	$this->connect();

	$result=$this->query("select * from Faculty where faculty_id = '$id'");

	if(!$result){
		return false;
	}

	return $this->fetch();
}

public function getFacultyByName($name){
	$this->connect();

	$result=$this->query("select * from Faculty where faculty_name like '%$name%'");

	if(!$result){
		return false;
	}

	return $this->fetch();
}
/*End of faculty methods*/

/*Functions of the course outline table*/
public function getCourses(){
	$this->connect();

	$result=$this->query("Select * from course_outline");

	if(!$result){
		return false;
	}

	return $this->fetch();
}

public function getCourseByName($name){
	$this->connect();

	$result=$this->query("select * from course_outline where course_name like %$name%");

	if(!$result){
		return false;
	}

	return $this->fetch();
}

public function getCourseById($id){
	$this->connect();

	$result=$this->query("select * from course_outline where course_id = $id");

	if(!$result){
		return false;
	}

	return $this->fetch();
}

public function searchAll($id, $name, $obj, $readings, $topics, $description){

$this->connect();
$script="select * from course_outline where course_id like %$id% or course_name like %$name% or course_objective like %$obj% or course_readings 
like %$readings% or course_topics like %$topics% or course_description like %$description% order by course_name";

$result=$this->query($script);

if(!$result){
	return false;
}

return $this->fetch();
}
/*end of course outline functions*/

}

?>