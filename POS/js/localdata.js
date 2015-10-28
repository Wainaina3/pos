 function sendRequest(u){
	// Send request to server
	//u a url as a string
	//async is type of request : waits until the server response comes back
	var obj=$.ajax({url:u,async:false});
	//Convert the JSON string to object
	return $.parseJSON(obj.responseText);//return object				
}

function doesConnectionExist() {
    var xhr = new XMLHttpRequest();
	var file = "http://cs.ashesi.edu.gh/~csashesi/class2016/david-wainaina/POS/requests/productresponse.js";
	//var file='http://localhost:8000/server/POS/requests/productresponse.php';
    var randomNum = Math.round(Math.random() * 10000);
     
    xhr.open('HEAD', file + "?rand=" + randomNum, false);
     
    try {
        xhr.send();
         
        if (xhr.status >= 200 && xhr.status < 304) {
		
            return true;
        } else {
	
            return false;
        }
    } catch (e) {
        return false;
    }
}

//try and get data from server and store it locally in local storage
function storeLocal(){
if(doesConnectionExist()){

var products='requests/productresponse.php?cmd=3';
var transactions='requests/transactionresponse.php?cmd=6';

var productsdata=sendRequest(products);
var transactionsdata=sendRequest(transactions);
if(productsdata.result==1){
 localStorage.setItem("products", JSON.stringify(productsdata.products));
}

if(transactionsdata.result==1){
 localStorage.setItem("transactions", JSON.stringify(productsdata.transactions));
}
}
}

$(document).ready(function(){
if(doesConnectionExist()){
var products='requests/productresponse.php?cmd=3';
var transactions='requests/transactionresponse.php?cmd=6';

var productsdata=sendRequest(products);
var transactionsdata=sendRequest(transactions);
if(productsdata.result==1){
 localStorage.setItem("products", JSON.stringify(productsdata.products));
}

if(transactionsdata.result==1){
 localStorage.setItem("transactions", JSON.stringify(productsdata.transactions));
}
}

});

