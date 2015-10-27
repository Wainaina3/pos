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
	}

	function get2() {
		var temp = document.getElementById("sel2").value;
		if(temp !="default"){
			id2 = temp;	
		}
		alert(id2);
	}

	function get3() {
		id3 = document.getElementById("sel3").value;
	// alert(id3);
}

function add2() {
	$.get("add.php", {num: 1, cos:id2, tan:id3},
		function(data){
			alert("data" + data );
		});

}



</script>

</head>

<body>


	<form >
		

		<?php



		include_once("faculty2.php");
		$obj= new faculty2(); 

		$array = $obj->getAllFaculty();
		echo "Name of Faculty: ";
		echo "<select id=sel2 onchange=get2()>";
		echo "<option value= 'default' >Default</option>";
		for($i=0;$i<sizeof($array);$i++){

			echo "<option value=".$array[$i]['f_id'].">";
			echo $array[$i]['f_name'];
			echo "</option>";
		}
		echo "</select>";

		echo "<br>";
		echo "<br>";
		echo "<br>";



		include("course.php");
		$obj= new course(); 

		$array = $obj->getAllCourse();
		echo "Course name: ";
		echo "<select id=sel3 onchange=get3()>";
		for($i=0;$i<sizeof($array);$i++){

			echo "<option value=".$array[$i]['c_id'].">";
			echo $array[$i]['c_name'];
			echo "</option>";
		}
		echo "</select>"; 

		?>
		<!--  <input type="submit" value="Add" onclick="add2()"/> -->
		<button onclick="add2()">Add</button>
	</form>


</body>
</html>