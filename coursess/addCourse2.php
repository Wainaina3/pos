<html>
<head>
	<title>Add Course Outline</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="css/elements.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	
	
	
	
	
	<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script src="js/my_js.js"></script>

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

	<script>
		$( document ).ready(function(){
			$(".button-collapse").sideNav();
		})
	</script>
</head>
<body>
	<div class="container">
		<div class="row">

			<div class="col-lg-12"><h2 id="pageheader">Department</h2></div>
		</div>
		<nav>
			<div class="nav-wrapper" id="navlo">

				<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
				<ul class="right hide-on-med-and-down">
					<li><a href="">Course Outline</a></li>
					<li><a href="">Faculty</a></li>
					<li><a href="dept_form.php">Department</a></li>
					<li><a href="">Logout</a></li>
				</ul>
				<ul class="side-nav" id="mobile-demo">
					<li><a href="">Course Outline</a></li>
					<li><a href="">Faculty</a></li>
					<li><a href="dept_form.php">Department</a></li>
					<li><a href="">Logout</a></li>
				</ul>
			</div>
		</nav>

		<table>
			<tr>
			<td id="content">

				<div id="divStatus" class="status">
					status message
				</div>
				<div id="divContent" class="courseOutline">

					<form id="outline" class="outline" name="outline" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<div > <input type="hidden" id="tablerows" name="tablerows" ></div>
						<div> <div class='headers'> Course Id </div><input type="text" length="30" name="course_id" id="course_id"> </div>
						<div> <div class='headers' > Course Name </div> <input type="text" length="30" name="course_name" id="course_name"></div>
						<div id='dept_selector' name='dept_select'><div class='headers'> Course Department</div>
						 </div>
						 <div class='headers'>
						 <select id="course_dept" name="course_dept" class="browser-default">
							<option value='none'>-select department- </option>
							<option value='cs'> Computer Science</option>
							<option value='ba'> Business </option>
							<option value='as'> Arts and Sciences</option>
							<option value='eng'> Engineering</option>
						</select>
					</div>

						<p><div> <div class='headers'> Course Objectives </div><textarea class='ckeditor' col="10" row="20" id="course_objective" name="course_objective"></textarea></div>
						</p>
						<p><div> <div class='headers'> Course Description </div> <textarea class='ckeditor' col="10" row="20" id="course_description" name="course_description"></textarea></div>
						</p>
						<div> <div class='headers'> Learning Goals </div> <textarea class='ckeditor' col="20" row="10" id="learning_goals" name="learning_goals"></textarea></div>
						<p>
							<div class='headers' id="scheduler" name="scheduler"> Course Schedule 

								<table id="schedule" name="schedule" border="1" width="100%" align="center">
									<div id="schedule_header" name="schedule_header"> <tr id='table_headers' name='table_headers'> 
										<td><b>Weeks</b></td>
										<td><b>Topics</b></td>
										<td><b>Readings</b></td>
										<td><b>Milestones</b></td>
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

	</div>
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
</body>
</html>	