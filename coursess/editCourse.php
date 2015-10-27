<html>
	<head>
		<title id="course_title" name="course_title"> View Course</title>
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

				return result;	//return object
				
			}
			function delete_c(id){
			
				 var theUrl="manipulation.php?cmd=1&id="+id;
				 var obj=sendRequest(theUrl);
				
				 
				 if(obj.result==1){
				 window.location="http://localhost/files/ash-webtech-2015-group9/index.php";

				 
				 }

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
		</script>
	</head>
	<body>
			<div class="container">
<div class="row">

			<div class="col-lg-12"><h2 id="pageheader">Course View</h2></div>
		</div>
		<nav>
			<div class="nav-wrapper" id="navlo">

				<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
				<ul class="right hide-on-med-and-down">
					<li><a href="coursev.php">Course Outline</a></li>
					<li><a href="faculth.php">Faculty</a></li>
					<li><a href="dept_form.php">Department</a></li>
					<li><a href="">Logout</a></li>
				</ul>
				<ul class="side-nav" id="mobile-demo">
					<li><a href="coursv.php">Course Outline</a></li>
					<li><a href="faculth.php">Faculty</a></li>
					<li><a href="dept_form.php">Department</a></li>
					<li><a href="">Logout</a></li>
				</ul>
			</div>
		</nav>
<!-- <ul class="nav nav-pills">
  <li role="presentation" class="active" onclick="update()"><a href="#">Update</a></li>
  <li role="presentation" class="active"><a href="#">Delete</a></li>
</ul> -->
		<table>
			
			<tr>
				
				<td id="content">
					
					<div id="divStatus" class="status">
						status message
					</div>
					<div id="divContent">
					<form id="outline" name="outline" class="outline" method="GET" action="edit.php">
						<?php
						include("course_outline.php");

						$obj=new course_outline();

					if(isset($_REQUEST['id'])){

					$course=$_REQUEST['id'];

					$result=$obj->getCourseById($course);
					$schedule=$obj->getCourseScheduleById($course);
				
				echo "<div>{$result['course_id']}</div>";
				echo '<div> <div class="headers"> Course ID </div> <input type="text" length="30" name="course_id" id="coruse_id" value="'.$result['course_id'].'"> </div>';
				echo '<div><div class="headers">Course Name </div> <input type="text" length="30" name="course_name" id="course_name" value="'.$result['course_name'].'"> </div>';
				echo '<div id="dept_selector" name="dept_selector"><div class="headers"> Course Department </div>';
				echo '<select id="course_dept" name="course_dept">';
				echo '<option value="none">--Select Department--</option>';
				if($result['course_dept']=="cs"){
					echo '<option value="cs" selected="selected"> Computer Science </option>';
				}
				else 
					echo '<option value="cs"> Computer Science </option>';
				if($result['course_dept']=="ba"){
					echo '<option value="ba" selected="selected">Business </option>';
				}
				else{
					echo '<option value="ba">Business </option>';
				}
				
				if($result['course_dept']=="as"){
					echo '<option value="as" selected="selected"> Arts and Sciences </option>';
				}
				else{
					echo '<option value="as" > Arts and Sciences </option>';
				}
				if($result['course_dept']=="eng"){
					echo "<option value='eng' selected='selected'> Engineering </option>";
				}
				else{
					echo "<option value='eng'> Engineering </option>";
				}
				
				echo "</select></div>";

				echo "<div> <div class='headers'> Course Objectives </div><textarea class='ckeditor' col='10' row='20' id='course_objective' name='course_objective'>".$result['course_objectives'] ."</textarea> </div>";
				echo "<div><div class='headers'> Course Description </div><textarea class='ckeditor' col='10' row='20' id='course_description' name='course_description'>".$result['course_descriptions'] ."</textarea></div>";
				echo "<div><div class='headers'> Learning Goals </div> <textarea class='ckeditor' col='10' row='20' name='learning_goals' name='learning_goals'>".$result['learning_goals'] ."</textarea></div>";

				echo "<div class='headers' id='scheduler' name='scheduler'> Course Schedule <table id='schedule' name='schedule' border='1'>";
				echo '<div id="schedule_header" name="schedule_header"> <tr id="table_headers" name="table_headers">';
				echo "<td> Weeks</td>
								<td>Topics</td>
								<td>Readings</td>
								<td>Milestones</td>";
				echo "</tr></div>";

					$rowNum=0;
					while($rows=$obj->fetch()){
					$rowNum++;
					echo "<tr>";
					echo "<td> <input type='text' id='weeks".$rowNum."' name='weeks".$rowNum."' value='{$rows['weeks']}'> </td>";
					echo "<td> <input type='text' id='topics".$rowNum."' name='topics".$rowNum."' value='{$rows['topics']}'> </td>";
					echo "<td> <input type='text' id='readings".$rowNum."' name='readings".$rowNum."' value='{$rows['readings']}'> </td>";
					echo "<td> <input type='text' id='milestones".$rowNum."' name='milestones".$rowNum."' value='{$rows['milestones']}'> </td>";
					

					echo "</tr>";

					}

				echo "</table></div>";	
               echo '<div><input type="hidden" id="tablerows" name="tablerows" value="'.$rowNum.'"></div>';
				echo '<div> <input type="button" onclick="addRow()" value="Add Row"></div>';
				echo "<div> <div class='headers'> Course Evaluations </div> <textarea class='ckeditor' col='10' row='10' id='course_evaluations' name='course_evaluations'>".$result['course_evaluations'] ."</textarea></div>";
				
				echo "<div> <div class='headers'> Course Readings </div><textarea class='ckeditor' col='10' row='10' id='course_readings' name='course_readings'>".$result['course_readings']."</textarea></div>";
				

					} 
	

					?>
				<div> <input type="submit" value="Save"></div>
				</form>
					
					</div>


				</td>
			</tr>
		</table>
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
					echo "Dropped <br>";
				}

				$week=$_REQUEST['weeks'.$i];
			
				$topic=$_REQUEST['topics'.$i];
				$reading=$_REQUEST['readings'.$i];
				$milestone=$_REQUEST['milestones'.$i];
				

				$sche=$obj->addSchedule($tablename,$week,$topic,$reading,$milestone);
				if($sche){
					echo "schedule updated";
				}
				else{
					echo "echo never updated";
				}

			}
			
			$courseName=$_REQUEST['course_name'];
			$courseReadings=$_REQUEST['course_readings'];
			$courseDescription=$_REQUEST['course_description'];
			$learningGoals=$_REQUEST['learning_goals'];
			$courseObjetives=$_REQUEST['course_objective'];
			$courseEvaluation=$_REQUEST['course_evaluations'];
			$courseDept=$_REQUEST['course_dept'];
			

					
				

			$res=$obj->updateCourse($courseName, $courseId, $courseObjetives, $courseReadings,$courseDescription,$courseEvaluation, $learningGoals,$courseDept);

			if($res){
				echo "passed";

			}
			else
				echo "not update";

			}
				else
					echo "error";

				//header("location:viewCourse.php?id=".$_REQUEST['course_id']."");
		?>
	</body>
</div>
</html>	