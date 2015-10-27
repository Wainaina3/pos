<html>
<head>
	<title>Department</title>
	<link rel="stylesheet" href="css/style.css">
	<script>

	</script>
</head>

<style type="text/css">
	#tableExample{
		text-align: center;
		border-spacing: 18px;
	}


</style>
<body>
	<table>
		<tr>
			<td colspan="2" id="pageheader">
				Application Header
			</td>
		</tr>
		<tr>
			<td id="mainnav">
				<div class="menuitem">menu 1</div>
				<div class="menuitem">menu 2</div>
				<div class="menuitem">menu 3</div>
				<div class="menuitem">menu 4</div>
			</td>
			<td id="content">
				<div id="divPageMenu">
					<span class="menuitem" ><a href="course_outlinePHP.php"> Course Outline </a></span>
					<span class="menuitem" >Faculty</span>
					<span class="menuitem" >Department</span>
					<input type="text" id="txtSearch" />
						<!-- <select>
							<option>by department</option>
							<option>by faculty</option>
						</select> -->
						<span class="menuitem">search</span>		
					</div>
					<div id="divContent">
						<form action="dept_form.php" method="GET">
							<table id="tableExample" width="100%">
								<tr>
									<td colspan="2" align="center">Add Department</td>
								</tr>

								<tr>
									<td><input type="text" name="did" placeholder="department id"  ></td>
								</tr>
								<tr>
									<td><input type="text" name="dname" placeholder="department name"  ></td>
								</tr>
								<tr>
									<td><input type="text" name="dhod" placeholder="department hod"  ></td>
								</tr>
								<tr>
									<td><input type="submit" value="Add"></td>
								</tr>
							</table>
						</form>
					</div>
				</td>
			</tr>
		</table>
	</body>
	</html>	

	<?php

	if(isset($_REQUEST['did']) && isset($_REQUEST['dname']) && isset($_REQUEST['dhod'])) {
		include ("Department.php");
		$obj=new Department();

		$id=$_REQUEST['did'];
		$name=$_REQUEST['dname'];
		$hod=$_REQUEST['dhod'];

		if(!$obj->addDept($id,$name,$hod)){
			echo"error adding".mysql_error();
		}else{
			echo"Data added.";
		}
	}

	
	?>