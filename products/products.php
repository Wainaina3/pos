<?php
include("adb.php");

class products extends adb{
	/**
	*a function to get a product identified by id
	*/
	function get_product($id){
		$str_query="select * from products where PRODUCT_ID=$id";
		if(!$this->query($str_query)){
			return false;
		}	
		return $this->fetch();
		
	}
	/**
	*a function to search by product_name and return true or false
	*/
	function search_by_name($product_name){
		$str_query="select * from products 
				where product_name like '%$product_name%'";
		
		return $this->query($str_query);
	
	
	}
	
	function add_products($product_name, $description,$price, $manufacturer_id){
		// you need a code to add product here
	}
	
	function getManufacturers(){
		$sql="select * from manufacturer";

		return $this->query($sql);
	}

	function searchByManfs($manfid){
		$sql="select * from products where manf_id=$manfid";

		return $this->query($sql);
	}

	function delete($id){
		$sql="delete from products where product_id=$id";

		return $this->query($sql);
	}
	
	
	
	
	
}
?>