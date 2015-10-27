 function sendRequest(u){
	// Send request to server
	//u a url as a string
	//async is type of request
	var obj=$.ajax({url:u,async:false});
	//Convert the JSON string to object
	return $.parseJSON(obj.responseText);//return object

				
}
/*this function is called when a food product is clicked.	
It sends a request to the server asking for the product details using the pid(product id) and the 
result is used to make the transaction.
If the product had  not been sold, a new row is created in the sales table and the product is added as part of 
sold items. Else, the function calls updatesale function which adds the number of items for that product and update
the prices accordingly.
*/
function sellProduct(uniqueImageDiv){
	var pid=uniqueImageDiv.getAttribute('id');
	var url="requests/productresponse.php?cmd=5&fid="+pid;
	
	var results=sendRequest(url); //a request is sent to the server and the results comes back in json format
	
	if(results){ 
		price=results[2];//can acces the results as an array 
		foodname=results['product_name']; //or as an associative array

		
		var transactionTable=document.getElementById("saleTable");//get the sale table from the page

		if(!document.getElementById(foodname)){ //check whether there is an element bearing the same name as the clicked product. skip if there is one.
			
		var rows=transactionTable.rows.length;  //get num rows of the table
		
		var row=transactionTable.insertRow(rows); //insert a row at the bottom of the table
		row.id=foodname; //make the row id to be the product name
		
		//create cells for that row 
		var foodcell=row.insertCell(0);		
		var qtycell=row.insertCell(1);
		var pricecell=row.insertCell(2);
		var actioncell=row.insertCell(3);
		//fill the cells with the product details
		foodcell.innerHTML=foodname;
		foodcell.id="foodnameid"; //the product name cell is given foodnameid as its id.
		qtycell.innerHTML=1;
		qtycell.id="quantityid"; //the product quantity cell is given quantityid as its id.
		pricecell.innerHTML=price;
		pricecell.id="priceid"; //the product price cell is given the priceid as its id.
        pricecell.className="priceClass";
		actioncell.innerHTML="";
		
		}
		else
			updateSale(foodname,price); //function to update the sale of a product 
		
		updateTotal() //function to update total price called
		
	}
	
}
//function to update the sale of a product by increasing quantity and price
function updateSale(name,price){
	var foodnamerow=document.getElementById(name); //get the row name by foodname as id
	
		if(foodnamerow.cells[0].innerHTML==name){//check whether the foodname is same as the row id
			foodnamerow.cells[1].innerHTML=parseInt(foodnamerow.cells[1].innerHTML)+1; //increase the count
			foodnamerow.cells[2].innerHTML=price*parseFloat(foodnamerow.cells[1].innerHTML); //update price
		}
		
}
//function to update the total after clicking a product
function updateTotal(){
	var totalPrice=0;//set the cell to zero.

	$(".priceClass").each(function(){ //for each cell with id priceid (the price cell)

		totalPrice=totalPrice+parseInt($(this).text()); //add to the totalprice variable.

	});

	var total=document.getElementById("totalprice");//get the cell with totalprice using the totalprice id
	
	total.value=totalPrice; //sets the totalprice in the respective cell.
	getChange(); //function is called to calculate the change to be given out to customer
}

function getChange(){
	$( "#paid" ).keyup(function() { //when the cash paid is added
	$("#change").val($("#paid").val() - $("#totalprice").val()); //the change field will evaluate to the paid amount - totalprice of products.
});
	if($("#totalprice").val()>1 && $("#paid").val()>1){ //this is executed after adding another product when paid amount is already available
		$("#change").val($("#paid").val() - $("#totalprice").val()); //change is calculated and filled in the appropriate field.
	}
}
//method to store a transaction in the database
function transact(){
	if($("#change").val()<0 || $("#change").val()==''){
		alert("Transaction not Possible");
		return;
	}
	
	var table=document.getElementById("saleTable");
	var rows=table.rows.length;
	var names="";
	var quantities="";
	var prices="";
	for(var k=1;k<rows;k++){
		var row=table.rows[k];
		names=names + row.cells[0].innerHTML + ","; //get all the food names separated by a comma

		quantities=quantities+row.cells[1].innerHTML+","; //get all quantities separated by a comma

		prices=prices+row.cells[2].innerHTML+","; //get all the total price of all

	}
    //delete all the rows after transaction
    for(var k=rows-1;k>-1;k--){

        table.deleteRow(k);
    }
	var totalPrice=document.getElementById("totalprice").value;
	
	
	//var empId=document.getElementById("empId").value;
	var empId=3;
	var tranId = Math.floor(Math.random() * (10000000)) + 10000000;
	var phone = $("#phone").val();
	var checkdiscount="requests/transactionresponse.php?cmd=7&phone="+phone;
	
	if(checkdiscount.result==1){
	alert("give discount");
	}
	var url="requests/transactionresponse.php?cmd=1&tranid="+tranId+"&fnames="+names+"&fqty="+quantities+
	"&fprice="+prices+"&total="+totalPrice+"&empid="+empId+"&phone="+phone;
	
	var transacted=sendRequest(url);
	alert("Transaction Completed");
	if(totalPrice>500){
	alert("derserves discount");
	var sendsms="requests/sms.php?cmd=1&phone="+phone+"&totalprice="+totalPrice;
	alert(sendsms);
	var sentsms=sendRequest(sendsms);
	}
	
    document.getElementById("totalprice").value=null;
    document.getElementById("change").value=null;
    document.getElementById("paid").value=null;
	
	
	
	

}
//function to add food in the database
function addProduct(){

	var productname=document.getElementById("productname").value; //get the food name
	var productprice=document.getElementById("productprice").value; //get the food price
	var categorySelector = document.getElementById("productcategory"); //get the category selector
	var productcategory = categorySelector.options[categorySelector.selectedIndex].value; //get the category

    var fullPath = document.getElementById('fileToUpload').value; //get the full path of uploaded image

    if (fullPath) {
        var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/')); //get the index where the name starts
        var filename = fullPath.substring(startIndex); //get the  filename of image
        if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) { //check whether the filename still contains a '\' character.
            filename = filename.substring(1); //remove the unwanted characters
        }
   

        var imageName = filename;

        var url = "requests/productresponse.php?cmd=1&fname=" + productname + "&fcateg=" + productcategory + "&fprice=" +
            productprice + "&pic=" + imageName;
	
        var response = sendRequest(url);
		
        if (response.result == 1) {
            alert("image upload done");

            // attach handler to form's submit event
            $('#addform').submit(function () {
                // submit the form
                $(this).ajaxSubmit();
                // return false to prevent normal browser submit and page navigation

                return false;
            });
        }
        else
            alert("image upload failed");

    }	
	
}

function why(){
	alert("Yuuuuu");
}

/*
  This function creates an image class
  with name, price, image link and id
  */
  function Product(pName,pPrice,pImageLink,pId,pCategory){
	  this.name=pName;
	  this.price=pPrice;
	  this.imageLink=pImageLink;
	  this.id=pId;
	  this.category=pCategory;

	 
  }
  //function to get the product's name
  Product.prototype.getProductName=function(){
	  return this.name;
  }
  //function to get the product's price
  Product.prototype.getProductPrice=function(){
	  return this.price;
  }
  //function to get the product's image link
  Product.prototype.getProductImage=function(){
	  return this.imageLink;
  }
  //function to get the product id
  Product.prototype.getProductId=function(){
	  return this.id;
  }
  //function to get the product category
  Product.prototype.getProductCategory=function(){
	  return this.category;
  }

/*
 This function loads all the products in the system for the users to see what they are selling.
 Objects are created using jquery and the data filled accordingly.
 */
function showProducts(){
	
    var products=sendRequest("requests/productresponse.php?cmd=3");
	
    if(products.result==1){
	//alert(products.foods.length);
        for(var i=products.products.length-1; i>=0;i--){
			//function Product(pName,pPrice,pImageLink,pId){
			var newProduct=new Product(products.products[i].product_name,products.products[i].price,"images/"+products.products[i].image_link,products.products[i].product_id,products.products[i].category);

        
            var mealsCount=0;
            var drinksCount=0;
            var mealsRowCount=1;
            var drinksRowCount=1;

            if(newProduct.getProductCategory()=="meals"){
                mealsCount++;
			
                if(mealsCount==3){
                    mealsRowCount++;
                    mealsCount=0;
                }
                var appendRow="#meal"+mealsRowCount;
                var parentClass=$("<div class='col-md-4'></div>") ;
                var wellClass=$("<div  class='well' </div>");

				var imageClick=$("<div id='changeThis' onClick='sellProduct(this)''></div>");



				var imageDiv=$("<div id='imageDiv' name='imageDiv' > </div>");
             	var imageHolder=document.createElement("IMG");
             	// setImageHeight();
				imageHolder.src=newProduct.getProductImage();
				imageHolder.width='180';
				imageHolder.height='160';
				imageHolder.class='img-responsive';
				
				
                //var imageHolder=$("<img src='imageLink' length='100' height='100' class='img-responsive' </div>");
				
                var itemDetails=$("<div id='item-details'> </div>");
                var nameSpan=$("<span id='productName'></span>").append(newProduct.getProductName()).append($("<br>"));
                 var priceSpan=$("<span id='productPrice'></span>").append("KSH" + " "+ newProduct.getProductPrice());

                itemDetails.append(nameSpan);
                itemDetails.append(priceSpan);
				imageDiv.append(imageHolder);
                wellClass.append(imageDiv);
               // imageClick.append(imageDiv);
                wellClass.append(itemDetails);
                imageClick.append(wellClass);
                parentClass.append(imageClick);

                $(appendRow).append(parentClass);
                var david=newProduct.getProductId();
                if(document.getElementById('changeThis')){
                    var getClicked=document.getElementById('changeThis');

                   getClicked.setAttribute('id',david);

                }

            }
			else if(newProduct.getProductCategory()=="drinks"){
                drinksCount++;
				
                if(drinksCount==3){
                    drinksRowCount++;
                    drinksCount=0;
                }
                var appendRow="#drinks"+drinksRowCount;
                var parentClass=$("<div class='col-md-4'></div>") ;
                var wellClass=$("<div  class='well' </div>");

				var imageClick=$("<div id='changeThis' onClick='sellProduct(this)''></div>");



				var imageDiv=$("<div id='imageDiv' name='imageDiv' > </div>");
             	var imageHolder=document.createElement("IMG");
             	// setImageHeight();
				imageHolder.src=newProduct.getProductImage();
				imageHolder.width='180';
				imageHolder.height='160';
				imageHolder.class='img-responsive';
				
				
                //var imageHolder=$("<img src='imageLink' length='100' height='100' class='img-responsive' </div>");
				
                var itemDetails=$("<div id='item-details'> </div>");
                var nameSpan=$("<span id='productName'></span>").append(newProduct.getProductName()).append($("<br>"));
                 var priceSpan=$("<span id='productPrice'></span>").append("KSH" + " "+ newProduct.getProductPrice());

                itemDetails.append(nameSpan);
                itemDetails.append(priceSpan);
				imageDiv.append(imageHolder);
                wellClass.append(imageDiv);
               // imageClick.append(imageDiv);
                wellClass.append(itemDetails);
                imageClick.append(wellClass);
                parentClass.append(imageClick);

                $(appendRow).append(parentClass);
                var david=newProduct.getProductId();
                if(document.getElementById('changeThis')){
                    var getClicked=document.getElementById('changeThis');

                   getClicked.setAttribute('id',david);

                }

            }

        }
    }

}

	function loadTransactions(){

			//var request="http://cs.ashesi.edu.gh/~csashesi/class2016/david-wainaina/waterReaderpgap/addData.php?cmd=2";
			var request='requests/transactionresponse.php?cmd=6';
				alert("called");
			var ajaxResults=sendRequest(request);
			alert("called");
			var tableName=document.getElementById("transactionstable");
			

				for (var i = 0; i < ajaxResults.transactions.length; i++) {
					if(ajaxResults.transactions.length>=tableName.rows.length){


					var tableRows=tableName.rows.length;
					var row=tableName.insertRow(tableRows);

					var tranid=row.insertCell(0);
					var prodnames=row.insertCell(1);
					var totalprice=row.insertCell(2);
					var time=row.insertCell(3);
					var custphone=row.insertCell(4);

					tranid.innerHTML=ajaxResults.transactions[i].transaction_id;
					prodnames.innerHTML=ajaxResults.transactions[i].food_names;
					totalprice.innerHTML=ajaxResults.transactions[i].total_price;
					time.innerHTML=ajaxResults.transactions[i].transaction_time;
					custphone.innerHTML=ajaxResults.transactions[i].customer_phone;
					
					}
				};
			
		}



