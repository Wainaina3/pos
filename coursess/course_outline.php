
	<?php
	include("Repository.php");
	class course_outline extends Repository{

//function to add a course
		public function addCourse($course_name,$course_id,$course_objective,
			$course_readings,$course_description, $course_evaluation, $learning_goals,$courseDept){

			$this->connect();

			$sqlScript="insert into course_outline set course_id='$course_id',course_name='$course_name', learning_goals='$learning_goals',
			course_objectives='$course_objective', course_descriptions='$course_description', course_readings='$course_readings',course_evaluations='$course_evaluation',course_dept='$courseDept'";
		
			return $this->query($sqlScript);
		}

		public function addSchedule($tableName, $week, $topic, $reading, $milestone){
			$this->connect();
			
			$sql = "CREATE TABLE if not exists  ".$tableName. " (weekid int(11) AUTO_INCREMENT PRIMARY KEY,
    			weeks varchar (255) NOT NULL,
    			topics varchar(255),
   			 	readings VARCHAR(255),
    			milestones varchar(255)
  				  )";

				$this->query($sql);

			
			$sqlScript="insert into $tableName set weeks='$week', topics='$topic', readings='$reading', milestones='$milestone' ";
			
			return $this->query($sqlScript);

		}


//function to update a course outline
		public function updateCourse($course_name,$course_id,$course_objective,
			$course_readings,$course_description, $course_evaluation, $learning_goals,$courseDept){

			$this->connect();

			$sqlScript="update course_outline set course_name='$course_name', learning_goals='$learning_goals',
			course_objectives='$course_objective', course_descriptions='$course_description', course_readings='$course_readings',course_evaluations='$course_evaluation',course_dept='$courseDept' where course_id='$course_id'";

			$this->query($sqlScript);
		}
//function to show all courses
		public function getCourses(){
			$this->connect();

			$result=$this->query("Select * from course_outline");

			if(!$result){
				return false;

			}
			return true;
		}
//function to search course by name
		public function getCourseByName($name){
			$this->connect();

			$result=$this->query("select * from course_outline where course_name like %$name%");

			if(!$result){
				return false;
			}

			return $this->fetch();
		}
//search course by course id
		public function getCourseById($id){
			$this->connect();

			$result=$this->query("select * from course_outline where course_id = $id");

			if(!$result){
				return false;
			}

			return $this->fetch();
		}

		public function getCourseScheduleById($id){
			$tablename="schedule".$id;

			$sqlScript="select * from $tablename";

			if(!$this->query($sqlScript)){
				return false;
			}
			else
				return true;
		}
//search course by any detail
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

		public function deleteCourse($course_id){
			$this->connect();
			$sql="delete from course_outline where course_id=$course_id";
			
			$res=$this->query($sql);

			return $res;
		}


		public function deleteSchedule($id){
			$this->connect();

			$sql="drop table if exists schedule".$id;
			
			$res=$this->query($sql);

			return $res;
		}

		public function search($txt){
			$sql="select * from course_outline where course_id like '%$txt%' or course_name like '%$txt%'  or course_dept like '%$txt%' ";

			$res=$this->query($sql);

			return $res;
		}

	}

/*
	 //<?php include_once('course_outline');
			 	//$obj=new course_outline();
			 //	$obj->addSchedule("+tablename+"," +week "," +topic+","+ reading + ","milestone ");
			// 	";
**/
	?>
