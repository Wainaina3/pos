 function sendRequest(u){
	// Send request to server
	//u a url as a string
	//async is type of request
	var obj=$.ajax({url:u,async:false});
	//Convert the JSON string to object
	return $.parseJSON(obj.responseText);//return object

				
}

//function to add food in the database (Not complete)
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
        alert(filename);

        var imageName = filename;

        var url = "requests/productresponse.php?cmd=1&fname=" + foodname + "&fcateg=" + foodcategory + "&fprice=" +
            foodprice + "&pic=" + imageName;

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
alert("Test working");
}

function loadProducts(){
}

