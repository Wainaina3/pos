<html>
<head>
	<title>Faculty</title>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>

	
	<link href="css/elements.css" rel="stylesheet"/>
	
	<link rel="stylesheet" href="css/style.css"/>
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />

	
	
	<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script src="js/my_js.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>

	<script type="text/javascript">
		function validate(){
			var obj = document.getElementById("name");
			var str = obj.value;
			if(str.length<=0){
				obj.style.border ="3";
				return false;
			}else{
				obj.style.border ="5";
				return false;
			}
			return false;
		}

		function logout(){

			$.get(
				"user_func.php", {act:2},
				function(data){
					window.location="login.html";				

				});
		}
		$( document ).ready(function(){
			$(".button-collapse").sideNav();
		})


		function ff(){
			var name =  document.getElementById('txtSearch').value;
			alert(name);
		}
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
		function add_faculty(){
			
			var facultyId=document.getElementById("fid").value;
			var fname=document.getElementById("fname").value;

			var res=sendRequest("faculD_a.php?cmd=1&id="+ facultyId + "&name="+fname);

			
		}

		function deleteFac(id){
			alert("delete tried");
			//var res=sendRequest("faculD_a.php?cmd=2&fid="+id);
			

		}

		function search(){
			var tbl=document.getElementById("table");
		var rows=tbl.rows.length;
		var txt=document.getElementById("txtSearch").value;

		for(i=rows;i>1;i--){
			tbl.deleteRow(i-1);

		}

		var results=sendRequest("faculD_a.php?cmd=4&txt="+txt);

				if(results.result!=0){		


					for(i=0;i<results.faculties.length;i++){
						

						tblrows=tbl.rows.length;
						row=tbl.insertRow(tblrows);
						if(i%2==0){
							row.style="background-color:#000000";
						}
						cid=row.insertCell(0);
						cname=row.insertCell(1);
						cdit=row.insertCell(2);
						cdel=row.insertCell(3);
						cid.innerHTML=results.faculties[i].Faculty_Id;
						cname.innerHTML=results.faculties[i].Faculty_Name;
						cdit.innerHTML="<a href='faculU.php?fid="+results.faculties[i].Faculty_Id +"'> Edit</a>";
						cdel.innerHTML="<a href='faculD.php?fid="+results.faculties[i].Faculty_Id +"'> Delete</a>";


					}
				}

		}



	</script>




</head>
<body id="body" style="overflow:hidden;">

	<div class="container">
		<div class="row">

			<div class="col-lg-12"><h2 id="pageheader">Faculty</h2></div>
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

						
						<li role="presentation"><a href="#" id="popup" onclick="div_show()">Add Faculty</a></li>
						
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



		<table id="maintable">

			<tr>
				<td id="content">
					
					<div id="divStatus" class="status">
						
					</div>
					<div id="divContent">

						<table id="tableE" width="100%" >
							<tr>
								<td align="left">
									<div id= "topbar"> 
										
									</div>
								</td>
							</tr>
						</table>
						<div id="test"></div>
						<div id="abc"></div>
						<div id="popupContact" style="display:none;" >
							<form  id="form"  name="form">
							<h2 id="addf">Add Faculty</h2>
								<img id="close" src="images/3.png" onclick="div_hide()">
								<div class="row"></div>
								<div class="row">
									<div class="input-field col s12" id="did">
									<i class="mdi-action-account-circle prefix"></i>
										<input id="fid" type="text" class="validate">
										<label for="fid" style="font-size:12px;">Faculty Id</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
									<i class="mdi-action-account-circle prefix"></i>
										<input id="fname" type="text" class="validate">
										<label for="fname" style="font-size:12px;">Faculty Name</label>
									</div>
								</div>
						
								<a href="#" id="submit" onclick="add_faculty()">Add</a>
							</form>
						</div>

						<div id="popupEdit" style="display:none;">
						<form  id="form"  name="form2">
							<h2 id="addf">Edit Data</h2>
								<img id="close" src="images/3.png" onclick="div_hide2()">
								<div class="row"></div>
								<div class="row">
									<div class="input-field col s12" id="did">
									<i class="mdi-action-account-circle prefix"></i>
										<input id="name" type="text" class="validate" autofocus>
										<label for="name" style="font-size:12px;color:gray;">Department Id</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
									<i class="mdi-action-account-circle prefix"></i>
										<input id="email" type="text" class="validate" autofocus>
										<label for="email" style="font-size:12px;">Department name</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
								<i class="mdi-action-account-circle prefix"></i>
										<input id="msg" type="text" class="validate" autofocus>
										<label for="msg" style="font-size:12px;">Head of Department</label>
									</div>
									
								</div>
								<a href="#" id="submit" onclick="update_dept()">Update</a>
							</form>
							
								
								
								
						</div>

					</div>
				</td>
			</tr>
		</table>

		<table>
			
			<tr>

				<td id="content">
					
					<center><H3>Faculty Members</H3></center>
					<?php

					include("faculty.php");
					$obj=new Faculty();

					

					$str="select * from FACULTY";

					$result=$obj->query($str);

					if(empty($result)){
						echo "Sorry, No such record exist";
						exit();
					}

					$row=$obj->fetch();
					if(!$row){
						echo "Sorry, No such record exist";
						exit();
					}
					$count=0;
					echo "<table border='0' align='center' width='100%' id='table'>";
					echo "<tr style='background-color:Black;color:white'><td>Faculty ID</td><td>Faculty Name</td><td>Edit</td><td>Delete</td></tr>";
					while($row){
						if($count%2==0){
							echo "<tr style='background-color:#EEEEEE'><td>{$row['Faculty_Id']}</td><td>{$row['Faculty_Name']}</td><td><a href='faculU.php?fid={$row['Faculty_Id']}'>Edit</a></td> <td> <a href='faculD.php?fid={$row['Faculty_Id']}'>Delete</a> </td></tr>";
						}
						else{
							echo "<tr><td>{$row['Faculty_Id']}</td><td>{$row['Faculty_Name']}</td><td><a href='faculU.php?fid={$row['Faculty_Id']}'>Edit</a></td> <td> <a href='faculD.php?fid={$row['Faculty_Id']}'>Delete</a> </td></tr>";
						}
						$row=$obj->fetch();
						$count++;
					}
					echo "</table>";

					?>
				</td>
			</tr>

		</table>


<p id="footer" >
			Copyright &copy Webtech Group 9
		</p>
	</div>
</body>
</html>	

