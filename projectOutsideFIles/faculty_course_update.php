<?php
			if(!isset($_REQUEST["fcid"])){
				echo "id is required";
				exit();
			}
			
			include("faculty_course.php");
			$obj= new Faculty_course();
			$obj->viewFaculty_course();
			
			$f_id=$row["faculty_id"];
			$c_id=$row["course_id"];
		?>
		<form method="GET" action="faculty_course_update.php">
			Faculty ID :<input type="text" name="fid" size="30" 
			value="<?php echo $f_id ?>" >
			Course ID :<input type="text" name="cid" size="30"
			value="<?php echo $c_id?>">
			<input type="submit" value="Update">
		</form>
		<?php
			include("faculty_course.php");
			$f_id=$_REQUEST['fid'];
			$c_id=$_REQUEST['cid'];
			$obj= new Faculty_course();
			$obj->updateFaculty_course($f_id,$c_id);
		?>