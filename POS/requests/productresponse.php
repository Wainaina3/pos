<?php
if(isset($_REQUEST['cmd'])){
	$cmd=$_REQUEST['cmd'];

	function getAllFoods(){
		include_once("products.php");

		$product=new products();

		if(!$product->getFoods()){
			echo '{"result":0,"message":"Could not get foods"}';
			return;
		}
		$row=$product->fetchArray();
		echo '{"result":1,"foods":[';
		while($row){
			echo json_encode($row);
			if($row=$product->fetchArray()){
				echo ',';
			}

		}
		echo ']}';
	}

	function getByCategory(){
		include_once("products.php");
		$product=new products();
		$categ=$_REQUEST['categ'];

		if(!$product->getFoodByCategory($categ)){
			echo '{"result":0,"message":"Could not get foods"}';
			return;
		}
		$row=$product->fetchArray();
		echo '{"result":1,"foods":[';
		while($row){
			echo json_encode($row);
			if($row=$product->fetchArray()){
				echo ',';
			}

		}
		echo ']}';
	}

	function getFoodById(){
		include_once("products.php");
		$product=new products();
		$fid=$_REQUEST['fid'];
	
		echo json_encode($product->getFoodById($fid));
		
			}

	function deleteFood(){
		include_once("products.php");
		$product=new products();
		$fid=$_REQUEST['fid'];

		if($product->deleteFood($fid)){
			echo '{"result":0,"message":"Food not deleted"}';
			return;
		}
		echo '{"result":1,"message":"Food Deleted"}';

	}

	function searchFood(){
		include_once("products.php");
		$product=new products();
		$txt=$_REQUEST['txt'];

		if(!$product->searchFood($txt)){
			echo '{"result":0,"message":"Could not get foods"}';
			return;
		}
		$row=$product->fetchArray();
		echo '{"result":1,"foods":[';
		while($row){
			echo json_encode($row);
			if($row=$product->fetchArray()){
				echo ',';
			}

		}
		echo ']}';

	}

	function addFood(){
		include_once("products.php");
		$product=new products();
		$fname=$_REQUEST['fname'];
		$fcateg=$_REQUEST['fcateg'];
		$fprice=$_REQUEST['fprice'];
		$pic=$_REQUEST['pic'];

		if(!$product->addFood($fname,$fcateg,$fprice,$pic)){
			echo '{"result":0,"message":"Could not add the food"}';
			return;
		}

		echo '{"result":1,"message":"Succesfully added food"}';
	}

	function updateFood(){
		include_once("products.php");
		$product=new products();
		$fid=$_REQUEST['fid'];
		$fname=$_REQUEST['fname'];
		$fcateg=$_REQUEST['fcateg'];
		$fprice=$_REQUEST['fprice'];
		$pic=$_REQUEST['pic'];

		if(!$product->updateFood($fid,$fname,$fcateg,$fprice,$pic)){
			echo '{"result":0,"message":"Could not add the food"}';
			return;
		}

		echo '{"result":1,"message":"Succesfully added food"}';
	}

	switch ($cmd) {
		case 1:
			addFood();
			break;
		case 2:
			updateFood();
			break;
		case 3:
			getAllFoods();
			break;
		case 4:
			getByCategory();
			break;
		case 5:
			getFoodById();
			break;
		case 6:
			deleteFood();
			break;
		case 7:
			searchFood();
			break;
		default:
			echo '{"cmd":"none","message":"No command issued"}';
			break;
	}

}

?>