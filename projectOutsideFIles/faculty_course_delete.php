  <?php
			if(isset($_REQUEST['fcid'])){
				include("faculty_course.php");
				$obj= new Faculty_course();
				
				//$f_id=$_REQUEST['fid'];
				//$c_id=$_REQUEST['cid'];
				$obj->delete($f_id,$c_id);
				}
				
						
		?>
	