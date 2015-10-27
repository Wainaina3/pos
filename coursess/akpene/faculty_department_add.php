<html>
<head><title>Add</title>
	<p>CHOOSE FROM THE DROPDOWN</p>
		<script src= "jquery-2.1.3.min.js"></script>
<script type="text/javascript">
var id1="";
var id2="";
var id3="";

function get1() {
	id1 = document.getElementById("sel1").value;
	alert(id1);
}
function get2() {
	id2 = document.getElementById("sel2").value;
	alert(id2);
}
function get3() {
	id3 = document.getElementById("sel3").value;
	alert(id3);
}

function add2() {
	$.get("add.php", {num: 2, cos:id2, san:id1},
		function(data){
         alert("data" + data );
	});
// // alert(id1);
// alert("asdf");
}



</script>

</head>

<body>


<form >
		
			
	<?php
				
					include ("adb.php");

					include_once("department2.php");
					$obj= new department2(); 

					$array = $obj->getAllDept();
					echo "Department name: ";
					echo "<select id=sel1 onchange=get1()>";
					for($i=0;$i<sizeof($array);$i++){
						
						echo "<option value=".$array[$i]['d_id'].">";
						echo $array[$i]['d_name'];
						echo "</option>";
					}
					echo "</select>";
					
                     echo "<br>";
                     echo "<br>";
                     echo "<br>";

                     include_once("faculty2.php");
					 $obj= new faculty2(); 

					$array = $obj->getAllFaculty();
					echo "Name of Faculty: ";
					echo "<select id=sel2 onchange=get2()>";
					for($i=0;$i<sizeof($array);$i++){
						
						echo "<option value=".$array[$i]['f_id'].">";
						echo $array[$i]['f_name'];
						echo "</option>";
					}
					echo "</select>";

					echo "<br>";
					echo "<br>";
					echo "<br>";



              ?>
                      <button onclick="add2()">Add</button>
						</form>

			
		</body>
		</html>