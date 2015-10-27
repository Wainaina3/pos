<?php
if(isset($_REQUEST['cmd'])){
	$cmd=$_REQUEST['cmd'];

	function getAllProducts(){
		include_once("products.php");

		$product=new products();

		if(!$product->getProducts()){
			echo '{"result":0,"message":"Could not get products"}';
			return;
		}
		$row=$product->fetchArray();
		echo '{"result":1,"products":[';
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
			echo '{"result":0,"message":"Could not get products"}';
			return;
		}
		$row=$product->fetchArray();
		echo '{"result":1,"products":[';
		while($row){
			echo json_encode($row);
			if($row=$product->fetchArray()){
				echo ',';
			}

		}
		echo ']}';
	}

	function getProductById(){
		include_once("products.php");
		$product=new products();
		$fid=$_REQUEST['fid'];
	
		echo json_encode($product->getProductById($fid));
		
			}

	function deleteProduct(){
		include_once("products.php");
		$product=new products();
		$fid=$_REQUEST['fid'];

		if($product->deleteProduct($fid)){
			echo '{"result":0,"message":"Product not deleted"}';
			return;
		}
		echo '{"result":1,"message":"Product Deleted"}';

	}

	function searchProduct(){
		include_once("products.php");
		$product=new products();
		$txt=$_REQUEST['txt'];

		if(!$product->searchProduct($txt)){
			echo '{"result":0,"message":"Could not get products"}';
			return;
		}
		$row=$product->fetchArray();
		echo '{"result":1,"products":[';
		while($row){
			echo json_encode($row);
			if($row=$product->fetchArray()){
				echo ',';
			}

		}
		echo ']}';

	}

	function addProduct(){
		include_once("products.php");
		$product=new products();
		$fname=$_REQUEST['fname'];
		$fcateg=$_REQUEST['fcateg'];
		$fprice=$_REQUEST['fprice'];
		$pic=$_REQUEST['pic'];

		if(!$product->addProduct($fname,$fcateg,$fprice,$pic)){
			echo '{"result":0,"message":"Could not add the product"}';

			return;
		}

		echo '{"result":1,"message":"Succesfully added product"}';
	}

	function updateProduct(){
		include_once("products.php");
		$product=new products();
		$fid=$_REQUEST['fid'];
		$fname=$_REQUEST['fname'];
		$fcateg=$_REQUEST['fcateg'];
		$fprice=$_REQUEST['fprice'];
		$pic=$_REQUEST['pic'];

		if(!$product->updateProduct($fid,$fname,$fcateg,$fprice,$pic)){
			echo '{"result":0,"message":"Could not add the product"}';
			return;
		}

		echo '{"result":1,"message":"Succesfully added product"}';
	}

	switch ($cmd) {
		case 1:
			addProduct();
			break;
		case 2:
			updateProduct();
			break;
		case 3:
			getAllProducts();
			break;
		case 4:
			getByCategory();
			break;
		case 5:
			getProductById();
			break;
		case 6:
			deleteProduct();
			break;
		case 7:
			searchProduct();
			break;
		default:
			echo '{"cmd":"none","message":"No command issued"}';
			break;
	}

}

?>