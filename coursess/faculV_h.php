<?php
include("faculty.php");
	$obj=new Faculty();

	if(isset($_REQUEST['st'])){
		$fa=$_REQUEST['st'];
		$str="select * from FACULTY where Faculty_Name like '%$fa%' OR Faculty_Id='$fa'";
		$result=$obj->query($str);
	    $row=$obj->fetch();
	    echo "Suggestion: ";
	    echo "<select>";
	    while($row){
	    	echo "<option value=''>".$row['Faculty_Name']."</option>";
	    	$row=$obj->fetch();
	    }
	    echo "</select>";
	}
?>