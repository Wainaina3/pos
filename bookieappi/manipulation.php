<?php
//type of request
//1: get description of product
//2: delete product
//3: edit price
$cmd=$_REQUEST['cmd'];
switch($cmd)
{
	case 1:
			get_products($_REQUEST['id']);
		break;
	case 2:
		delete_product($_REQUEST['id']);
		break;	
	default:
}

function get_products($id){
	include("products.php");
		$obj=new products();
		
		$row=$obj->get_product($id);
		//return a JSON string to browser when request comes to get description
		echo '{"result":1,"desc":"' .$row['description'] . '"}'; 
}

function delete_product($id){
	include("products.php");
		$obj=new products();
		
		if($obj->delete($id)){
		
			echo '{"result":1,"message": "deleted"}';
		}else{
			echo '{"result":0,"message": "product not removed."}';
		}
}

function search_product($searchTxt){
	include("products.php");

	$obj=new products();

	if($obj->seachProducts($searchTxt)){
		
	}




}
?>