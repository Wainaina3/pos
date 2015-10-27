<html>
	<head>
		<title>Add Course Outline</title>
		<link rel="stylesheet" href="css/style.css">
		<script src="jquery_1.5.min.js"></script>
		<script src="ckeditor/ckeditor.js"></script>
		<script>

			function sendRequest(u){

				// Send request to server
				//u a url as a string
				//async is type of request
				var obj=$.ajax({url:u,async:false});
				//Convert the JSON string to object
				var result=$.parseJSON(obj.responseText);
			//	alert("request sent");
				return result;	//return object
				
			}

		function addRow() {
			//alert("CLiecked")
  			var table = document.getElementById("schedule");
  			rowNum=table.rows.length;
   			var row = table.insertRow(rowNum);
    		var cell1 = row.insertCell(0);
    		var cell2 = row.insertCell(1);
    		var cell3 = row.insertCell(2);
    		var cell4 = row.insertCell(3);
    		cell1.innerHTML =  "<input type='text' id='weeks" +rowNum+ "' name='weeks" +rowNum+"'>";
    		cell2.innerHTML = "<input type='text' id='topics" +rowNum+ "'name='topics" +rowNum+"'>";
    		cell3.innerHTML = "<input type='text' id='readings" +rowNum+"'name='readings"+rowNum+"'> ";
    		cell4.innerHTML = "<input type='text' id='milestones" +rowNum+ "' name='milestones"+rowNum+"'> ";
   			
    		var box=document.getElementById("tablerows");
    		box.value=rowNum;
		}
		
		// CKEDITOR.replace('course_readings' );
		// CKEDITOR.replace('course_objective');
		// CKEDITOR.replace('course_evaluations');
		// CKEDITOR.replace('learning_goals');
		// CKEDITOR.replace('course_description');
		// CKEDITOR.replace('course_objective');
		// CKEDITOR.replace('course_objective');
		// CKEDITOR.replace('course_objective');


		</script>

		<style type="text/css">
		#footer {
		    background-color:black;
		    color:white;
		    clear:both;
		    text-align:center;
		    margin-right: 0.7in;
		    padding:5px;         
		}

		</style>
	</head>
	<body>
		<table>
			<tr>
				<td colspan="2" id="pageheader">
					Add Course Outline
				</td>
			</tr>
			<tr>
				<td id="mainnav">
					<div class="menuitem">View</div>
					<div class="menuitem">Add</div>
					<div class="menuitem">Delete</div>
					<div class="menuitem">Update</div>
				</td>
				<td id="content">
					<div id="divPageMenu">
					<span class="menuitem" ><a href="index.php">Home</a></span>
						
						<span class="menuitem" > <a href="faculView.php">Faculty</a></span>
						<span class="menuitem" ><a href="">Department</a></span>
						<input type="text" id="txtSearch" />
						
						<span class="menuitem">search</span>		
					</div>
					<div id="divStatus" class="status">
						status message
					</div>
					<div id="divContent" class="courseOutline">
						
						<form id="Outline" class="Outline" name="Outline" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<div > <input type="hidden" id="tablerows" name="tablerows" ></div>
						<div> <div class='headers'> Course Id </div><input type="text" length="30" name="course_id" id="course_id"> </div>
						<div> <div class='headers' > Course Name </div> <input type="text" length="30" name="course_name" id="course_name"></div>
						<div id='dept_selector' name='dept_select'><div class='headers'> Course Department</div>
						<select id="course_dept" name="course_dept" class="browser-default">
							<option value='none'>-select department- </option>
							<option value='cs'> Computer Science</option>
							<option value='ba'> Business </option>
							<option value='arts'> Arts and Sciences</option>
							<option value='eng'> Engineering</option>
						</select> </div>
						<p><div> <div class='headers'> Course Objectives </div><textarea class='ckeditor' col="10" row="20" id="course_objective" name="course_objective"></textarea></div>
						</p>
						<p><div> <div class='headers'> Course Description </div> <textarea class='ckeditor' col="10" row="20" id="course_description" name="course_description"></textarea></div>
						</p>
						<div> <div class='headers'> Learning Goals </div> <textarea class='ckeditor' col="20" row="10" id="learning_goals" name="learning_goals"></textarea></div>
						<p>
						<div class='headers' id="scheduler" name="scheduler"> Course Schedule <table id="schedule" name="schedule" border="1">
							<div id="schedule_header" name="schedule_header"> <tr id='table_headers' name='table_headers'> 
								<td> Weeks</td>
								<td>Topics</td>
								<td>Readings</td>
								<td>Milestones</td>
							 </tr></div>
						</table></div>

						<div> <input type="button" onclick="addRow()" value="Add Row"></div>
						</p>
						<p>
						<div> <div class='headers'> Course Evaluations </div> <textarea class='ckeditor' col="10" row="10" id="course_evaluations" name="course_evaluations"></textarea></div>
						</p>
						<p>
						<div> <div class='headers'> Course Readings </div> <textarea class='ckeditor' col="10" row="10" id="course_readings" name="course_readings"></textarea></div>
						</p>
						<div> <input type="submit" value="Save"></div>
						 </form>
						
					</div>
				</td>
			</tr>

		</table>


		<?php
		include_once("course_outline.php");

		if(isset($_REQUEST['course_id']) && isset($_REQUEST['course_name']) && isset($_REQUEST['course_readings']) && isset($_REQUEST['course_evaluations'])&&
			isset($_REQUEST['course_description']) && isset($_REQUEST['learning_goals']) && isset($_REQUEST['course_objective'])){
		
			$courseId=$_REQUEST['course_id'];
			$tablename="schedule".$courseId;
			$obj=new course_outline();

			$rows=$_REQUEST['tablerows'];
			
			for($i=1;$i<$rows+1;$i++){

				$week=$_REQUEST['weeks'.$i];
			
				$topic=$_REQUEST['topics'.$i];
				$reading=$_REQUEST['readings'.$i];
				$milestone=$_REQUEST['milestones'.$i];
				

				$obj->addSchedule($tablename,$week,$topic,$reading,$milestone);
			}
			
			$courseName=$_REQUEST['course_name'];
			$courseReadings=$_REQUEST['course_readings'];
			$courseDescription=$_REQUEST['course_description'];
			$learningGoals=$_REQUEST['learning_goals'];
			$courseObjetives=$_REQUEST['course_objective'];
			$courseEvaluation=$_REQUEST['course_evaluations'];
			$courseDept=$_REQUEST['course_dept'];
			

					
				

				$res=$obj->addCourse($courseName, $courseId, $courseObjetives, $courseReadings,$courseDescription,$courseEvaluation, $learningGoals,$courseDept);

				

				}
		?>
		<div id="footer">
    	Copyright &copy Friends Solution
    </div>
	</body>
</html>	