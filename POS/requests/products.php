<?php
include_once("base.php");
class products extends base{
//gets all the products in the restaurant
function getProducts(){
$sql="select * from products";

return $this->query($sql);	
}
//gets product belonging to a given category
function getProductByCategory($categ){
	$sql="select * from products where category='$categ'";

	return $this->query($sql);
}
//get product identified by a given id
function getProductById($id){
	$sql="select * from products where product_id='$id'";

	if(!$this->query($sql)){
		return false;
	}
	return $this->fetchArray();
}
//add a product in the database
function addProduct($name,$cate,$price,$pic){
	$sql="insert into products set product_name='$name',price='$price',image_link='$pic',category='$cate'";
	//$sql="insert into products set product_name='mimi',price=12,image_link='acn2.jpg',category='fast'";

	return $this->query($sql);
}
//update  Product in the database
function updateProduct($id,$name,$cate,$price,$pic){
	$sql="update products set product_name='$name',product_price='$price',image_link='$pic',category='$cate' where product_id='$id'";

	return $this->query($sql);
}
//delete product from the database
function deleteProduct($id){
	$sql="delete from products where product_id='$id'";

	return $this->query($sql);
}
//search for product in the database
function searchProduct($txt){
	$sql="select * from products where product_name like '%$txt%'";

	return $this->query($sql);
}



}

?>