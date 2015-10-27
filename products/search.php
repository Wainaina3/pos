<?php
session_start();
if(!isset($_SESSION["user_name"])){
header("location:login.php");
}
else{
	
// print_r($_SESSION["user_name"]);
// print_r($_SESSION["user_id"]);
}

?>

<html>
	<head>
		<title>Index</title>
		<link rel="stylesheet" href="css/style.css">
		<script src="jquery_1.5.min.js"></script>
		<script>
			function sendRequest(u){
				// Send request to server
				//u a url as a string
				//async is type of request
				var obj=$.ajax({url:u,async:false});
				//Convert the JSON string to object
				var result=$.parseJSON(obj.responseText);
				return result;	//return object
				
			}
			function getDesc(id){
				var theUrl="hello.php?cmd=1&id="+id;
				var obj=sendRequest(theUrl);		//send request to the above url
				if(obj.result==1){					//check result
					$("#divDesc").text(obj.desc);		//set div with the description from the result
					$("#divDesc").css("top",event.y);	//set the location of the div
					$("#divDesc").css("left",event.x);	
					$("#divDesc").show();				//show the div element
				}else{
					//show error message
					$("#divStatus").text("error while getting description");
					$("#divStatus").css("backgroundColor","red");
				}
			}
			
			function deleteProduct(id){
				//$("#divStatus").load("hello.php?cmd=2&id="+id);
				var objResult=sendRequest("hello.php?cmd=2&id="+id);
				
				if(objResult.result==1){
					$("#divStatus").text(objResult.message);
					//remove the product from the search table
				}else{
					$("#divStatus").text(objResult.message);
					$("#divStatus").css("backgroundColor","red");
				}
				
			}
			function savePrice(id,newPrice){
				//write a function to send a request to update price of a product
			}
		
			function search(){
				var search_text=txtSearch.value;

				var strUrl="hello.php?cmd=4&st="+search_text;

				var objResult=sendRequest(strUrl);



				if(objResult.result==0){
					$("#divStatus").text(objResult.message);
					return;
				}
				prodTable=document.getElementById("prodTable");
				
				rowNum=prodTable.rows.length;
				for(i=rowNum;i>1;i--){
					prodTable.deleteRow(i-1);
				}
   				
				
				for (i = 0; i < objResult.products.length; i++) { 

   					rowNum=prodTable.rows.length;
					var row=prodTable.insertRow(rowNum);

					if(i%2==0){
					row.style.backgroundColor="Khaki";
					}

					var name=row.insertCell(0);
					var price=row.insertCell(1);
					var manf=row.insertCell(2);
					var edit=row.insertCell(3);

					name.innerHTML=""+objResult.products[i].product_name;
					price.innerHTML="" +objResult.products[i].product_price;
					manf.innerHTML="" +objResult.products[i].manf_id;
					edit.innerHTML="<span onclick='deleteProduct("+objResult.products[i].product_id +")'>Delete</span>";
					// edit.innerHTML="<span onclick='check()'>Delete</span>";
					//edit.innerHTML='<a href="http://your.domain.tld">Link Title</a>'
				}


                 
				
					
			}
			function check(){
				alert("Check");
			}
			
			function displayProducts(obj){
			
			}

			function searchByManf(){

				var search_text=document.getElementById("manfs").value;

				var strUrl="hello.php?cmd=5&manf="+search_text;

				var objResult=sendRequest(strUrl);



				if(objResult.result==0){
					$("#divStatus").text(objResult.message);
					return;
				}
				prodTable=document.getElementById("prodTable");
				rowNum=prodTable.rows.length;

				for(i=rowNum;i>1;i--){
					prodTable.deleteRow(i-1);
				}
   				
				
				for (i = 0; i < objResult.products.length; i++) { 

   					rowNum=prodTable.rows.length;
					var row=prodTable.insertRow(rowNum);

					if(i%2==0){
					row.style.backgroundColor="Khaki";
					}
					var check=row.insertCell(0);
					var name=row.insertCell(1);
					var price=row.insertCell(2);
					var manf=row.insertCell(3);
					var edit=row.insertCell(4);

					name.innerHTML="<input type='checkbox' id='products[]' name='products[]' value= " +objResult.products[i].product_id +">";
					//<input type='checkbox' id=''products[]' name='products[]' value='{$row['product_id']}'>
					name.innerHTML=""+objResult.products[i].product_name;
					price.innerHTML="" +objResult.products[i].product_price;
					manf.innerHTML="" +objResult.products[i].manf_id;
					edit.innerHTML="<span class='clickspot' onclick='deleteProduct("+objResult.products[i].product_id +")'>Delete</span>";

				}
				for (i=0; i<prodTable.rows.length; i++){
                 	rows[i].cells[3].onclick=function(){
                 	searchByManf();
                 	}
                 }

			}
		</script>
	</head>
	<body>
		<table>
			<tr>
				<td colspan="2" id="pageheader">
					Application Header
				</td>
			</tr>
			<tr>
				<td id="mainnav">
					<div class="menuitem">menu 1</div>
					<div class="menuitem">menu 2</div>
					<div class="menuitem">menu 3</div>
					<div class="menuitem">menu 4</div>
				</td>
				<td id="content">
					<div id="divPageMenu">
						<span class="menuitem" >page menu 1</span>
						<span class="menuitem" >page menu 2</span>
						<span class="menuitem" >page menu 3</span>
						
						<input type="text" id="txtSearch" >
						<?php
						include_once("products.php");

						$obj=new products();
						$obj->getManufacturers();
						echo "<select onchange=searchByManf() id='manfs' name='manfs'>";
						echo "<option value='0'> -- </option>";
						while($row=$obj->fetch()){
							echo "<option value='{$row['manufacturer_id']}'> {$row['name']} </option>";
						}

						echo "</select>";
						?>
						<span class="clickspot" onclick="search()">Search</span>
						
						
						 		
					</div>
					<div id="divStatus" class="status">
						status message
					</div>
					<div id="divContent">
						Content space
						<span class="clickspot">click here </span>
						<?php
							include_once("products.php");
	
							$obj=new products();
							$search_text="";
							if(isset($_REQUEST['txtSearch'])){
								$search_text=$_REQUEST['txtSearch'];
							}
							$obj->search_by_name($search_text);
							
							echo "<table border='1' id='prodTable'>";
							echo "<tr style='background-color:olive; color:white; text-align:center'><td></td><td>Name</td><td>Price</td><td>manufacturers</td><td></td></tr>";
							
							$row=$obj->fetch();
							$style="";
							$i=0;
							while($row){
								if($i%2==0){
									$style="style='background-color:Khaki'";
								}else{
									$style="";
								}
								echo "<tr $style >";
								echo "<td><input type='checkbox' id=''products[]' name='products[]' value='{$row['product_id']}'></td>";
								echo "<td><span class='clickspot' onclick='getDesc({$row['product_id']})'>{$row['product_name']}<span></td>";
								echo "<td>{$row['product_price']}</td> <td>{$row['manf_id']}</td>";
								echo "<td><span class='clickspot' onclick='getDesc({$row['product_id']})'>Edit<span> &nbsp   <span class='clickspot' onclick='deleteProduct({$row['product_id']})'>Delete<span></td>";
								echo "</tr>";
								$row=$obj->fetch();
								$i++;
							}
						?>
					</div>
				</td>
			</tr>
		</table>
		<div id="divDesc" style="display:none;position:absolute;top:0;left:0">
			this a div
		</div>
	</body>
</html>	




