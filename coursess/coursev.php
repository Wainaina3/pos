

<!DOCTYPE html>
<html>
<head>
	<title>Course</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	
	<link href="css/elements.css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	<link rel="stylesheet" href="css/style.css">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	
	
	<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script src="js/my_js.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
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

			function courseOutlines(){

				var results=sendRequest("manipulation.php?cmd=2");
				var tbl= document.getElementById("course_outlines");

				if(results.result!=0){		

					for(i=0;i<results.outlines.length;i++){
						
 
						tblrows=tbl.rows.length;
						row=tbl.insertRow(tblrows);
					
						if(i%2==0){
							row.style="background-color:#EEEEEE";
						}
						cid=row.insertCell(0);
						cname=row.insertCell(1);
						cdept=row.insertCell(2);
						cid.innerHTML="<a href='viewCourses.php?id="+results.outlines[i].course_id +"'>"+results.outlines[i].course_id +"</a>";;
						cname.innerHTML="<a href='viewCourses.php?id="+results.outlines[i].course_id +"'>"+results.outlines[i].course_name +"</a>";
						cdept.innerHTML="<a href='viewCourses.php?id="+results.outlines[i].course_id +"'>"+results.outlines[i].course_dept +"</a>";


					}
				}
			}


			function logout(){

				$.get(
					"user_func.php", {act:2},
					function(data){
						window.location="login.html";				

					});
			}

			function check(){

				var txt=document.getElementById("txtSearch").value;
				alert(txt);
			}

			function search(){
				
				var txt=document.getElementById("txtSearch").value;
				
				var results=sendRequest("manipulation.php?cmd=3&search="+ txt);

				var tbl= document.getElementById("course_outlines");
				
				rows=tbl.rows.length;
				for(i=rows; i>1;i--){
					tbl.deleteRow(i-1);
				}

				if(results.result!=0){		


					for(i=0;i<results.outlines.length;i++){
						

						tblrows=tbl.rows.length;
						row=tbl.insertRow(tblrows);
						if(i%2==0){
							row.style="background-color:#EEEEEE";
						}
						cid=row.insertCell(0);
						cname=row.insertCell(1);
						cdept=row.insertCell(2);
						cid.innerHTML="<a href='viewCourses.php?id="+results.outlines[i].course_id +"'>"+results.outlines[i].course_id +"</a>";
						cname.innerHTML="<a href='viewCourses.php?id="+results.outlines[i].course_id +"'>"+results.outlines[i].course_name +"</a>";
						cdept.innerHTML="<a href='viewCourses.php?id="+results.outlines[i].course_id +"'>"+results.outlines[i].course_dept +"</a>";


					}
				}

				

			}

			$( document ).ready(function(){
				$(".button-collapse").sideNav();
			})
		</script>
	
	</head>
	<body onload="courseOutlines()" id="body" style="overflow:hidden;">

		<div class="container">

			<div class="row">

				<div class="col-lg-12"><h2 id="pageheader">Course Outline</h2></div>
			</div>

			<nav>
				<div class="nav-wrapper" id="navlo">

					<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
					<ul class="right hide-on-med-and-down">
						<li><a href="coursev.php" style="font-size:16px;">Course Outline</a></li>
						<li><a href="facultyView.php"style="font-size:16px;">Faculty</a></li>
						<li><a href="dept_form.php" style="font-size:16px;">Department</a></li>
						<li><a href="" style="font-size:16px;" onclick="logout()">Logout</a></li>
					</ul>
					<ul class="side-nav" id="mobile-demo" >
						<li><a href="coursev.php" style="font-size:16px;">Course Outline</a></li>
						<li><a href="facultyView.php" style="font-size:16px;">Faculty</a></li>
						<li><a href="dept_form.php" style="font-size:16px;">Department</a></li>
						<li><a href="" onclick="logout()" style="font-size:16px;">Logout</a></li>
					</ul>
				</div>
			</nav>



			<div class="row">

				<div class="col-lg-6"></div>
				<div class="col-lg-6">

					<div class="col-md-6">
						<ul class="nav nav-pills" >
							<li role="presentation"><a href="index.php">Home</a></li>
							<li role="presentation"><a href="addCourse.php" id="popup">Add</a></li>



						</ul>
					</div>

					<div class="col-md-6">
					<nav id="df"> 
						<div class="nav-wrapper" id="navs" >
							<div class="input-field" >
								<input id="txtSearch" style="font-size:13px;height:30px;" type="search" required size="50px" onkeyup="search()">
								<label for="search" style="margin-top:-15px;"><i class="mdi-action-search"></i></label>
								<i class="mdi-navigation-close" style="margin-top:-15px;height:0px;"></i>
							</div>
						</div>
					</nav>
						
					</div>
				</div>

				<div class="col-lg-12"> </div>


			</div>



			<div id="divContent">
			<table id="course_outlines" name="course_outlines" border="1px" >

					<tr class="theaders" id="theaders" name="theaders" style="background-color:black;color:white;"> 
					<td> <b>Course ID<b> </td>
						<td><b> Course Name<b></td>
						<td> <b>Course Department<b></td>
						
					</tr>

				</table>

			</div>
			<p id="footer" >
				Copyright &copy Webtech Group 9
			</p>
		</div>
	</body>
	</html>	