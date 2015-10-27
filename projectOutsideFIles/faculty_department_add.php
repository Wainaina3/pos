<form method="GET" action="faculty_department_add.php">
			Faculty ID :<input type="text" name="fid" size="30">
			<br>Department ID :<input type="text" name="did" size="30">
			<input type="submit" value="Add">
		</form>

	    <?php
			if(isset($_REQUEST['fid'])){
				include("faculty_department.php");
				$obj= new Faculty_department(); 
				
				$f_id=$_REQUEST['fid'];
				$d_id=$_REQUEST['did'];
				if(!$obj->addFaculty_department($f_id,$d_id)){
					echo "Error adding"; 
				}
				else{
					echo "Added";
				}
				
			}			
		?>
	