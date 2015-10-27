<?php

if(isset($_REQUEST['cmd'])){
 $cmd=$_REQUEST['cmd'];
 
 


 function deleteCourse(){
	 $id=$_REQUEST['id'];
	 include("course_outline.php");
	 $obj=new course_outline();
	 
	 //$script="delete from course_outline where course_id='$id'";
	 
	 if(!$obj->deleteCourse($id) or !$obj->deleteSchedule($id)){
	 echo '{"result":0, "message":"Deletion not complete."}';
		 	 }
	 else 
		echo '{"result":1, "message":"$id Deleted."}';
 }

 function getCourseOutlines(){

 	include_once("course_outline.php");

 	$obj=new course_outline();

 	if(!$obj->getCourses()){
 		echo '{"result":0, "message":"No available course outlines"}';
 		return;
 	}
 	$row=$obj->fetch();
 	echo '{"result":1,"outlines":[';
 	while($row){
 		echo json_encode($row);
 		$row=$obj->fetch();
 		if($row){
 			echo ",";
 		}
 	}
 	echo "]}";


 }

 function search(){
 	include_once("course_outline.php");

 	$obj=new course_outline();
 	$txt=$_REQUEST['search'];
 	if(!$obj->search($txt)){
 		echo '{"result":0, "message":"Searched Item does not exists"}';
 		return;
 	}
 	$row=$obj->fetch();
 	echo '{"result":1,"outlines":[';
 	while($row){
 		echo json_encode($row);
 		$row=$obj->fetch();
 		if($row){
 			echo ",";
 		}
 	}
 	echo "]}";

 }

 switch ($cmd) {
 	case 1:
 		deleteCourse();
 		break;
 	case 2:
 	 	getCourseOutlines();
 	 	break;
 	case 3:
 		search();
 		break;
 	
 	default:
 		# code...
 		break;
 }



}
else
	echo '{"result":0, "message":"No request made"}';



?>