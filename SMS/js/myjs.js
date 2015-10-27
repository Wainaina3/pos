/**
 * Created by David on 20/10/2015.
 */
function sendRequest(u){
    // Send request to server
    //u a url as a string
    //async is type of request
    var obj=$.ajax({url:u,async:false});
    //Convert the JSON string to object
    var result=$.parseJSON(obj.responseText);
    //	alert("request sent");

    return result;	//return object

}

function register(){
    var fname=$("#fname").val();
    var lname=$("#lname").val();
    var gpa=$("#gpa").val();
    var studid=$("#sid").val();
	var phone=$("#phone").val();
    var major = $('#major :selected').text();
    var sclass=$("#class :selected").text();

    var url="http://localhost:8000/server/SMS/requests/send.php?";
	//var url="http://cs.ashesi.edu.gh/~csashesi/class2016/david-wainaina/SMS/requests/send.php?";
    var sendurl=url+"cmd=1&fname="+fname+"&lname="+lname+"&gpa="+gpa+"&studid="+studid+"&major="+major+"&sclass="+sclass+"&phone="+phone;
	alert(sendurl);
    var request=sendRequest(sendurl);
    //if(request.result==1){
    //    alert("Success");
    //}
    //else{
    //    alert("could not insert data");
    //}
}