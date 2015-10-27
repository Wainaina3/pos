<html>
<head>
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

	<script type="text/javascript">


		function updateFaculty(){
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function(){
				if(xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById("hint").innerHTML=xmlhttp.responseText;
				}
			}
			var id=document.getElementById("f");
			var na=document.getElementById("na");
			xmlhttp.open("GET","faculU_a.php?fid="+id.value+"&fna="+na.value,true);
			xmlhttp.send();

			
		}

		function Exit() {
     		var x=confirm('Are You sure want to exit:');
     		if(x) window.close();
   		}

</script>
<script>
		$( document ).ready(function(){
			$(".button-collapse").sideNav();
		})
	</script>
</head>
	<body>
		<!--remember to close this-->
		<div class="row">

			<div class="col-lg-12"><h2 id="pageheader">Faculty</h2></div>
		</div>

	<nav>
			<div class="nav-wrapper" id="navlo">

				<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
				<ul class="right hide-on-med-and-down">
					<li><a href="coursv.php">Course Outline</a></li>
					<li><a href="faculU.php">Faculty</a></li>
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
	<?php
	if(isset($_GET['fid'])){
	include("faculty.php");
	$obj=new Faculty();
	$fid=$_GET['fid'];
	$str="select * from FACULTY where Faculty_Id='$fid'";
	$res=$obj->query($str);
	$row=$obj->fetch();
	echo "<center>";
	echo "<br>";
	echo "<center><b><font size=5>Faculty Update</font></b></center><br>";
	echo "<center><div><input type='text' name='fid' id='f' value='{$row['Faculty_Id']}' readonly></div><br>";
	echo "<div><input type='text' name='fna' id='na' value='{$row['Faculty_Name']}'></div><br>";
	echo "<div><input type='submit' onclick='updateFaculty()' value='Save'></div><br></center>";
	echo "</center>";
}
?>
		</td>
		</tr>	
		</table>
		<div id="footer">
    	Copyright &copy Friends Solution
    </div>
</body>
</html>