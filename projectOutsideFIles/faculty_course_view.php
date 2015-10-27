 <?php
			if(isset($_REQUEST['fcid'])){
				include("faculty_course.php");
				$obj= new Faculty_course();
				
				//$f_id=$_REQUEST['fid'];
				//$c_id=$_REQUEST['cid'];
				$fc_id=$_REQUEST['fcid'];
				if(!$obj->viewFaculty_course($fc_id)){
					echo "Error viewing"; 
				}
				$result=$obj->fetch();
				echo $result;

				}
			}			
		?>
	