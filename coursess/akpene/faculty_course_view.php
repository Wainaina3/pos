 <?php

	echo "ALL FACULTIES";
			 
				include("faculty_course.php");
				$obj= new Faculty_course();
				
			
				 $obj->viewFaculty_course();
				
	 echo "<table border='1'>";
	 echo "<tr style='text-align:center'><td>Faculty ID</td><td>Faculty Name</td><td>Course Name</td></tr>";

				while ($row=$obj->fetch()) {
				echo "<tr><td>{$row['faculty_id']}</td>";
				echo "<td>{$row['Faculty_Name']}</td>";
				echo "<td>{$row['course_name']}</td></tr>";

			}
			echo "</table>";			
		?>
