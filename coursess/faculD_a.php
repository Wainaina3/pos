<?php
if(isset($_REQUEST['cmd'])){
$cmd=$_REQUEST['cmd'];
function delete(){
include("faculty.php");
	$obj=new Faculty();
	$id=$_REQUEST['fid'];
	
	$res=$obj->deleteFacultyById($id);
	if(!$res){
		die('Deletion Failed ');
	}
	else{
	
		header("location:facultyView.php");
	}	
}
function add(){
	include("faculty.php");
	$obj=new Faculty();
	$id=$_REQUEST['id'];
	$name=$_REQUEST['name'];

	if(!$obj->addFacultyDetail($id,$name)){
		return false; 
	}
	else
		return true;
}

function search(){
	include_once("faculty.php");
	$obj= new Faculty();
	$txt=$_REQUEST['txt'];
	if(!$obj->search($txt)){
 		echo '{"result":0, "message":"Searched Item does not exists"}';
 		return;
 	}
 	$row=$obj->fetch();
 	echo '{"result":1,"faculties":[';
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
		add();
		break;
	case 2:
		delete();
		break;
	case 3:
		update();
		break;
	case 4:
		search();
		break;
	default:
		# code...
		break;
}

}
?>