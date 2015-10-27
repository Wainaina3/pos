<?php
//type of request
//1: get description of product
//2: delete product
//3: edit price
if(!isset($_REQUEST['cmd'])){
	echo '{"result":0,message:"unknown command"}';
	exit();
}
$cmd=$_REQUEST['cmd'];

switch($cmd)
{
	case 1:
		get_product();	
		break;
	case 2:
		delete_product();
		break;
	case 3:
		//edit
		break;
	case 4:
		search_product();
		break;
	case 5:
		getProdsByManufacs();
		break;
	
	default:
		echo '{"result":0,message:"unknown command"}';
		break;
}

function get_product(){
	include("products.php");
	$obj=new products();
	$id=$_REQUEST['id'];
	$row=$obj->get_product($id);
	//return a JSON string to browser when request comes to get description
	echo '{"result":1,"desc":"' .$row['product_description'] . '"}';
}

function delete_product(){
	include("products.php");
	$obj=new products();
	$id=$_REQUEST['id'];
	if($obj->delete($id)){
		echo '{"result":1,"message": "deleted"}';
	}else
		echo '{"result":0,"message": "product not removed."}';
	
	
}	

function search_product(){
	if(!isset($_REQUEST['st'])){
		//return error
		echo '{"result":0,"message": "search did not work."}';
	}
	$search_text=$_REQUEST['st'];
	include("products.php");
	$obj=new products();
	if(!$obj->search_by_name($search_text)){
		//return error
		echo '{"result":0,"message": "search did not work."}';
		return;
	}
	//at this point the search has been successful. 
	//generate the JSON message to echo to the browser
	$row=$obj->fetch();
	echo '{"result":1,"products":[';	//start of json object
	while($row){
		echo json_encode($row);			//convert the result array to json object
		$row=$obj->fetch();
		if($row){
			echo ",";					//if there are more rows, add comma 
		}
	}
	echo "]}";							//end of json array and object
}

function getProdsByManufacs(){
	if(!isset($_REQUEST['manf'])){
		//return error
		echo '{"result":0,"message": "search did not work."}';
	}
	$search_text=$_REQUEST['manf'];
	include("products.php");
	$obj=new products();
	if(!$obj->searchByManfs(($search_text))){
		//return error
		echo '{"result":0,"message": "search did not work."}';
		return;
	}
	//at this point the search has been successful. 
	//generate the JSON message to echo to the browser
	$row=$obj->fetch();
	echo '{"result":1,"products":[';	//start of json object
	while($row){
		echo json_encode($row);			//convert the result array to json object
		$row=$obj->fetch();
		if($row){
			echo ",";					//if there are more rows, add comma 
		}
	}
	echo "]}";							//end of json array and object
}


?>