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

		function logout(){

			$.get(
				"user_func.php", {act:2},
				function(data){
					window.location="login.html";				

				});
		}
	</script>

	
</head>
<body>
	<div class="container">
		<div class="row">

			<div class="col-lg-12"><h2 id="pageheader">Faculty</h2></div>
		</div>
		<nav>
			<div class="nav-wrapper" id="navlo">

				<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
				<ul class="right hide-on-med-and-down">
					<li><a href="coursev.php">Course Outline</a></li>
					<li><a href="faculth.php">Faculty</a></li>
					<li><a href="dept_form.php">Department</a></li>
					<li><a href="" onclick="logout()">Logout</a></li>
				</ul>
				<ul class="side-nav" id="mobile-demo">
					<li><a href="coursev.php">Course Outline</a></li>
					<li><a href="faculth.php">Faculty</a></li>
					<li><a href="dept_form.php">Department</a></li>
					<li><a href="" onclick="logout()">Logout</a></li>
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

						<?php
						if(isset($_GET['fid'])){
							include("faculty.php");
							$obj=new Faculty();

							$fid=$_GET['fid'];
				
							$row=$obj->select();
							if($row){


							while(>$res=$obj->fetch()){
							echo "<center>";
							echo "<br>";
							echo "<center><b><font size=5>Faculty Update</font></b></center><br>";
							echo "<center><div><input type='text' name='fid' id='f' value='{$row['Faculty_Id']}' readonly></div><br>";
							echo "<div><input type='text' name='fna' id='na' value='{$row['Faculty_Name']}'></div><br>";
							echo "<div><input type='submit' onclick='updateFaculty()' value='Save'></div><br></center>";
							echo "</center>";

							}
							echo "none";
						}
						}
						?>
						
					</div>
				</td>
			</tr>

		</table>
		<div id="footer">
			Copyright &copy Webtech Group 9
		</div>
	</div>

	
</body>
</html>	