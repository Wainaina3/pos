<html>
<head>
	<title>Department</title>
	<link rel="stylesheet" href="css/style.css">
	<link href="css/elements.css" rel="stylesheet">
	
	<script type="text/javascript" src="js/jquery-1.5.min.js"></script>

	<script src="js/my_js.js"></script>

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

	</script>



</head>
<body id="body" style="overflow:hidden;">
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
					<input type="text" id="txtSearch" size="10" />
					<span class="menuitem">search</span>		
				</div>
				<div id="divContent">
					
						<table id="tableExample" width="100%">
							<tr>
								<td align="left">
									<div id= "topbar"> <a href="#" onclick="">View </a>
										<a href="#" id="popup" onclick="div_show()">Add </a></div>
									</td>
								</tr>
							</table>
							<div id="abc">
								<div id="popupContact">
									<form action="#" id="form" method="post" name="form" onsubmit="return validate()">
										<img id="close" src="images/3.png" onclick="div_hide()">
										<h2>Add Department</h2>
										<hr>
										<input id="name" name="name" placeholder="department id" type="text">
										<input id="email" name="email" placeholder="department name" type="text">
										<textarea id="msg" name="message" placeholder="head of department"></textarea>
										<a href="javascript:%20check_empty()" id="submit">Add</a>
									</form>
								</div>
							</div>
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
	echo "$id";
	$name=$_REQUEST['dname'];
	$hod=$_REQUEST['dhod'];

	if(!$obj->addDept($id,$name,$hod)){
		echo"error adding".mysql_error();
	}else{
		echo"Data added.";
	}
}


?>