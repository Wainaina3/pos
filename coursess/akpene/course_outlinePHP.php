<html>
	<head>
		<title>Index</title>
		<link rel="stylesheet" href="css/style.css">
		<script>
			
		</script>
	</head>
	<body>
		<table>
			<tr>
				<td colspan="2" id="pageheader">
					COURSE REPOSITORY
				</td>
			</tr>
			<tr>
				<td id="mainnav">
					<div class="menuitem"><a href="faculty_course_view.php">View</a></div>
					<p><div class="menuitem"><a href= "faculty_course_add.php">Add Faculty and Course</a></div></p>
					<p><div class="menuitem"><a href= "faculty_department_add.php">Add Faculty and Department</a></div></p>
				</td>
				<td id="content">
					<div id="divPageMenu">
					<span class="menuitem" >Home</span>
						<span class="menuitem" >Course Outline</span>
						<span class="menuitem" >Faculty</span>
						<span class="menuitem" ><a href="dept_form.php">Department</a></span>
						<input type="text" id="txtSearch" />
						
						<span class="menuitem">search</span>		
					</div>
					<div id="divStatus" class="status">
						status message
					</div>
					<div id="divContent">
						
						<table id="tableExample" class="reportTable" width="100%" border="2">
							<tr>
								<td height="300px">
									
							Information area
								</td>
							</tr>

						</table>
					</div>
				</td>
			</tr>
		</table>
	</body>
</html>	


	<?php
	include("Repository.php");
	class course_outline extends Repository{

//function to add a course
		public function addCourse($course_name,$course_id,$course_objective,
			$course_topics,$course_readings,$course_description,$course_grading){

			$this->connect();

			$sqlScript="insert into course_outline set course_id='$course_id',course_name='$course_name'
			course_objective='$course_objective',course_topics='$course_topics', course_description='$course_description', course_grading='$course_grading'";

			$this->query($sqlScript);
		}
//function to update a course outline
		public function updateCourse($course_name,$course_id,$course_objective,
			$course_topics,$course_readings,$course_description,$course_grading){

			$this->connect();

			$sqlScript="update course_outline set course_id=$course_id,course_name=$course_name
			course_objective=$course_objective,course_topics=$course_topics, course_description=$course_description, course_grading=$course_grading";

			$this->query($sqlScript);
		}
//function to show all courses
		public function getCourses(){
			$this->connect();

			$result=$this->query("Select * from course_outline");

			if(!$result){
				return false;

			}
			return $this->fetch();
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

			$this->query($sql);
		}

	}

	?>