<form method="GET" action="faculty_department_view.php">
			Faculty ID :<input type="text" name="fid" size="30">
			Department ID :<input type="text" name="did" size="30">
			<input type="submit" value="Add">
		</form>

	    <?php
	    include 'adb.php';
			if(isset($_REQUEST['fid']&&$_REQUEST['did'])){
				include("faculty_department.php");
				$obj= new Faculty_course();
				
				$f_id=$_REQUEST['fid'];
				$d_id=$_REQUEST['did'];
				if(!$obj->viewFaculty_course($f_id,$d_id)){
					echo "Error viewing"; 
				}
				$obj->fetch();
				
			}			
		?>
	