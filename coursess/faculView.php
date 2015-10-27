<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	
	<link href="css/elements.css" rel="stylesheet">
	
	<link rel="stylesheet" href="css/style.css">
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />

	
	
	<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script src="js/my_js.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>

	<script src="js/my_js.js"></script>

	<script type="text/javascript">

		function search(){
			var search_text=txtSearch.value;
			var strUrl="hello.php?cmd=3&st="+search_text;
			var result=sendRequest(strUrl);
			if(objResult.result==0){
				$("#divStatus").text(objResult.message);
				return;
			}
		}

		function showHint(str){
			if(str.length==0){
				document.getElementById("hint").innerHTML="";
				return;
			}
			else{
				var xmlhttp=new XMLHttpRequest();
				xmlhttp.onreadystatechange=function(){
					if(xmlhttp.readyState==4 && xmlhttp.status==200){
						document.getElementById("fo").innerHTML=xmlhttp.responseText;
					}
				}
				//sea.value=str;
				xmlhttp.open("GET","faculView.php?st="+str,true);
				xmlhttp.send();
			}
		}

		function deleteFac(id){
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function(){
				if(xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById("hint").innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","faculD.php?fid="+id,true);
			xmlhttp.send();
		}	

	</script>
	<style type="text/css">
		td{
			text-align: justify;
			height: 20px;
		}
		/*#footer {
			background-color:black;
			color:white;
			clear:both;
			text-align:center;
			padding:5px;         
		}*/
	</style>
</head>
<body id="fo">
	<div class="container">

		<div class="row">
			<div class="col-lg-12" ><h2 id="pageheader">Faculty</h2>

				
			</div>
		</div>

		<nav>

			<div class="nav-wrapper" id="navlo">

				<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
				<ul class="right hide-on-med-and-down">
					<li><a href="coursev.php" style="font-size:16px;">Course Outline</a></li>
					<li><a href="faculView.php"style="font-size:16px;">Faculty</a></li>
					<li><a href="dept_form.php" style="font-size:16px;">Department</a></li>
					<li><a href="" style="font-size:16px;" onclick="logout()">Logout</a></li>
				</ul>
				<ul class="side-nav" id="mobile-demo" >
					<li><a href="coursev.php" style="font-size:16px;">Course Outline</a></li>
					<li><a href="faculView.php" style="font-size:16px;">Faculty</a></li>
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

						<li role="presentation"><a href="index.php" id="viewh">Home</a></li>
						<li role="presentation"><a href="#" id="popup" onclick="div_show()">Add Faculty</a></li>
						
					</ul>
				</div>

				<div class="col-md-6" >
					<nav id="df"> 
						<div class="nav-wrapper" id="navs" >
							<div class="input-field" >
								<input id="txtSearch" style="font-size:13px;" type="search" required size="50px" >
								<label for="search" style="margin-top:-15px;"><i class="mdi-action-search"></i></label>
								<i class="mdi-navigation-close" style="margin-top:-15px;height:0px;"></i>
							</div>
						</div>
					</nav>
					
				</div>
			</div>

			<div class="col-lg-12"> </div>


		</div>

					<div id="popupContact" style="display:none;" >
							<form  id="form"  name="form">
							<h2 id="addf">Add Department</h2>
								<img id="close" src="images/3.png" onclick="div_hide()">
								<div class="row"></div>
								<div class="row">
									<div class="input-field col s12" id="did">
									<i class="mdi-action-account-circle prefix"></i>
										<input id="depId" type="text" class="validate">
										<label for="depId" style="font-size:12px;">Department Id</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
									<i class="mdi-action-account-circle prefix"></i>
										<input id="depName" type="text" class="validate">
										<label for="depName" style="font-size:12px;">Department name</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
								<i class="mdi-action-account-circle prefix"></i>
										<input id="hod" type="text" class="validate">
										<label for="hod" style="font-size:12px;">Head of Department</label>
									</div>
									
								</div>
								<a href="#" id="submit" onclick="add_dept()">Add</a>
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
		<table>
			
			<tr>

				<td id="content">
					
					<center><H3>Faculty Members</H3></center>
					<?php

					include("faculty.php");
					$obj=new Faculty();

					if(isset($_REQUEST['st'])){
						$fa=$_REQUEST['st'];
						$str="select * from FACULTY where Faculty_Name like '%$fa%' OR Faculty_Id='$fa'";
					}

					else{
						$str="select * from FACULTY";
					}
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
					echo "<table border='0' align='center' width='100%' >";
					echo "<tr style='background-color:Black;color:white'><td>Faculty ID</td><td>Faculty Name</td><td>Edit</td><td>Delete</td></tr>";
					while($row){
						if($count%2==0){
							echo "<tr style='background-color:#EEEEEE'><td>{$row['Faculty_Id']}</td><td>{$row['Faculty_Name']}</td><td><a href='faculU.php?fid={$row['Faculty_Id']}'>Edit</a></td><td><a href='faculD.php?fid={$row['Faculty_Id']}' onclick='deleteFac({$row['Faculty_Id']})'>Delete</a><td></td></tr>";
						}
						else{
							echo "<tr><td>{$row['Faculty_Id']}</td><td>{$row['Faculty_Name']}</td><td><a href='faculU.php?fid={$row['Faculty_Id']}'>Edit</a></td><td><a href='faculD.php?fid={$row['Faculty_Id']}' onclick='deleteFac({$row['Faculty_Id']})'>Delete</a><td></td></tr>";
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
<footer></footer>
</html>