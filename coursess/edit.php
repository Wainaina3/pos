<?php
include_once("course_outline.php");

if(!empty($_REQUEST['course_id']) && !empty($_REQUEST['course_name']) && !empty($_REQUEST['course_readings']) && !empty($_REQUEST['course_evaluations'])&&
	!empty($_REQUEST['course_description']) && !empty($_REQUEST['learning_goals']) && !empty($_REQUEST['course_objective'])){
		
			$courseId=$_REQUEST['course_id'];
			$tablename="schedule".$courseId;
			$obj=new course_outline();

			$rows=$_REQUEST['tablerows'];
			
			for($i=1;$i<$rows+1;$i++){
				if($i==1){
					$del="drop table $tablename";
					$obj->query($del);
					
				}

				$week=$_REQUEST['weeks'.$i];
			
				$topic=$_REQUEST['topics'.$i];
				$reading=$_REQUEST['readings'.$i];
				$milestone=$_REQUEST['milestones'.$i];
				

				$sche=$obj->addSchedule($tablename,$week,$topic,$reading,$milestone);
				

			}
			
			$courseName=$_REQUEST['course_name'];
			$courseReadings=$_REQUEST['course_readings'];
			$courseDescription=$_REQUEST['course_description'];
			$learningGoals=$_REQUEST['learning_goals'];
			$courseObjetives=$_REQUEST['course_objective'];
			$courseEvaluation=$_REQUEST['course_evaluations'];
			$courseDept=$_REQUEST['course_dept'];
			

					
				

			$res=$obj->updateCourse($courseName, $courseId, $courseObjetives, $courseReadings,$courseDescription,$courseEvaluation, $learningGoals,$courseDept);

			header("location:viewCourses.php?id=".$_REQUEST['course_id']."");
		}
		else
		header("location:editCourse.php?id=".$_REQUEST['course_id']."");
		?>