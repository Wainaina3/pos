<form method="GET" action="faculty_course_add.php">
			Faculty ID :<input type="text" name="fid" size="30">
			<p><br>Course ID :<input type="text" name="cid" size="30">
			<br><input type="submit" value="Add">
		</form>

	    <?php
			if(isset($_REQUEST['fid'])){
				include("faculty_course.php");
				$obj= new Faculty_course(); 
				
				$f_id=$_REQUEST['fid'];
				$c_id=$_REQUEST['cid'];
				if(!$obj->addFaculty_course($f_id,$c_id)){
					echo "Error adding"; 
				}
				else{
					echo "Added";
				}
				
			}			
		?>
	