<?php

/**
 * author: 
 * date:
 * description: A root class for all manage classes. This class communicates with DB
 */

 define("DB_HOST", 'localhost');
 define("DB_NAME", 'csashesi_david-wainaina');
 define("DB_PORT", 3306);
 define("DB_USER","csashesi_dw16");
 define("DB_PWORD","db!o^_r46");

header('content-type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');  
/*
define("DB_HOST", 'localhost');
define("DB_NAME", 'registration');
define("DB_PORT", 3306);
define("DB_USER","root");
define("DB_PWORD",""); 
*/


define("LOG_LEVEL_SEC",0);
define("LOG_LEVEL_DB_FAIL",0);


define("PAGE_SIZE",10);



function log_msg($level, $er_code, $msg, $mysql_msg){
	return 0;
}

class send {

	/**error description*/
    var $str_error;
    /*error code*/
    var $error;
    /*db connection link*/
    var $link;
    /* Every error log has a 4 digit code. The first two digits(prefix) tells you which class logged the error*/
    var $er_code_prefix;
    /* query result resource*/
    var $result;

    function adb() {
       
        $this->er_code_prefix=1000;
        $this->link=false;
        $this->result = false;
    }

    /**
     * logs error into database using functions defined in log.php
     */
    function log_error($level, $code, $msg, $mysql_msg = "NONE") {
        $er_code = $this->er_code_prefix + $code;
		//call to a predefined function 
        $log_id = log_msg($level, $er_code, $msg, $mysql_msg);
        //if log id is false return 0;
        if (!$log_id) {
            return 0;
        }

        //display this code to user
        $this->error="$er_code-$log_id";
        return $log_id;
    }

    /**
	* creates connection to database
	*/
    function connect() {

        if($this->link)
        {
            return true;
        }
        //try to connect to db
        $this->link = mysql_connect(DB_HOST , DB_USER, DB_PWORD);
		
        if (!$this->link) {
            //if connection fail log error and set $str_error
            //echo "not connected";	//debug line
            $this->log_error(LOG_LEVEL_DB_FAIL,1, "connection failed  in db:connect()", mysql_error());
            return false;
        }
		//echo "connected";
        if (!mysql_select_db(DB_NAME)) {
            
            $log_id = $this->log_error(LOG_LEVEL_DB_FAIL,2, "select db failed   in db:connect()", mysql_error($this->link));
            return false;
        }

        return true;
    }

        
	/**
	*returns a row from a data set
	*/
    function fetch() {
        return mysql_fetch_assoc($this->result);
    }

    /**
	* connect to db and run a query 
	*/
    function query($str_sql) {
		
        if (!$this->connect()) {		
            return false;
        }
        
        $this->result = mysql_query($str_sql,$this->link);
        if (!$this->result) {
            $this->log_error(LOG_LEVEL_DB_FAIL, 4, "query failed", mysql_error($this->link));
           // echo mysql_error();
            return false;
        }

        return true;
    }
	
	/**
	* returns number of rows in current dataset
	*/
    function get_num_rows() {
        return mysql_num_rows($this->result);
    }
	/**
	*returns last auto generated id 
	*/
    function get_insert_id() {
        return mysql_insert_id($this->link);
    }

    //function to add data to register database
    function addRecord()
    {
		$fname=$_REQUEST['fname'];
		$lname=$_REQUEST['lname'];
		$gpa=$_REQUEST['gpa'];
		$major=$_REQUEST['major'];
		$sid=$_REQUEST['studid'];
		$class=$_REQUEST['sclass'];
		$phoneless=$_REQUEST['phone'];
		$phone="+".$phoneless;
     $sql="Insert into students set firstName='$fname',lastName='$lname',class='$class',gpa='$gpa',major='$major',studid='$sid',phone='$phone'";

     if($this->query($sql)){
		 $msg=$fname." $lname you have succesfully registered. Your ID is: $sid. Karibu Goghoyo";
		$this->sendRegistrationMessage($phone,$msg);
     }
    

	}
	//function to get all the records in the student table
	function getRecords(){
        $sqlRequest="select * from students";

        if( $this->query($sqlRequest)){

            $row=$this->fetch();
            echo '{"result":1,"data":[';

            while($row){
            echo json_encode($row);
            $row=$this->fetch();
            if($row){
                echo ",";
            }
        }
        echo "]}";
        }

	}
	//incomplete function
	function getRecord(){
	$msg=$_REQUEST['message'];
	$secret=$_REQUEST['secret'];
	$from=$_REQUEST['from'];
	$msgArray=split("",$msg);
	
	$sid=$msgArray[1];
	
	$sql="Select * from students where studid='$sid'";
	$this->query($sql);
	
	}
	
	function sendSms($from,$msg){
		include_once "smsGateway.php";
		$smsGateway = new SmsGateway('dwainaina3@gmail.com', 'panyaroot');
		$deviceID=14117;
		
		$result=$smsGateway->sendMessageToNumber($from,$msg,$deviceID);
	}
	//function to send sms to a number....Working Hurraaaaaaay!!!
	function sendSms2(){
		include_once "smsGateway.php";
		
		$smsGateway = new SmsGateway('dwainaina3@gmail.com', 'panyaroot');
		$deviceID=14117;
		$rahab='+233542617729';
		$nobert='+233274009398';
		$ruth='+233504169918';
		$benso='+233542615890';
		$sender=$_REQUEST['contact']; //get the sender details with ID, Name and Number as Keys
		$from=$sender['Number']; //get the sender number from the multidimensional array
		
		$message='Hello ';
	
		$result=$smsGateway->sendMessageToNumber($benso,$message,$deviceID);
	}
	//gets details of student via sms
	function receiveDetails(){ 
		$secret=$_REQUEST['secret'];
		$msg=$_REQUEST['message'];
		$sender=$_REQUEST['contact']; //get the sender details with ID, Name and Number as Keys
		$msgArray=explode(" ",$msg); //split the message body into an array
		
		$from=$sender['Number']; //get the sender number from the multidimensional array
		$sid=$msgArray[0]; //get the first string sent in the message...in this case it should be the user SID
		 if($secret==="1234"){ //check the secret code sent by the gateway
			$sql="Select * from students where studid='$sid'"; //select the student details with send ID
		
			 if( $this->query($sql)){

				$row=$this->fetch();
				$sms= $row['firstName']." Major: ".$row['major']."  GPA: ".$row['gpa'] ; //get the details from database query result
				$this->sendSms($from,$sms); //send the message back to the user.
			}
			
		 }
			
		
	}
	//register student via sms
	function registerFromSms($from,$msgArray){
		$fname=$msgArray[1]; //sencod word is first name
		$lname=$msgArray[2]; //third word is lastname
		$class=$msgArray[3]; //fourth word is class
		$gpa=$msgArray[4];  //fifth word is gpa
		$major=$msgArray[5]; //sixth word is major
		$sid=$msgArray[6];  //seventh word is studid
		
		 if($secret==="1234"){ //check the secret code sent by the gateway
		 
			$sql="Insert into students set firstName='$fname',lastName='$lname',class='$class',gpa='$gpa',major='$major',studid='$sid',phone='$from'";
			 if( $this->query($sql)){
				 
				$msg=$fname." $lname you have succesfully registered. Your ID is: $sid. Karibu Goghoyo";
				$this->sendRegistrationMessage($phone,$msg); //send a succes msg to student
			}
			
		 }
	}
	//send gpa after requesting
	function sendGpa(){
		$secret=$_REQUEST['secret'];
		$msg=$_REQUEST['message'];
		$sender=$_REQUEST['contact']; //get the sender details with ID, Name and Number as Keys
		$msgArray=explode(" ",$msg); //split the message body into an array
		
		$from=$sender['Number']; //get the sender number from the multidimensional array
		
		if($msgArray[0]==="GPA"){
			$sid=$msgArray[1];
		
		
		 
			$sql="select gpa from students where studid='$sid'";
			 if( $this->query($sql)){
				 $row=$this->fetch();
				$sms=$fname." your GPA is ".$row['gpa'] . "Karibu sana Goghoyo:)"; 
				$this->sendSms($from,$sms); //send the message back to the user.
			}
			
		 
		}
	}
	
	//function to send the major of a student
	function sendMajor($from,$sid){
		$sql="select major from students where studid='$sid'";
		
		if($this->query($sql)){
			$row=$this->fetch();
			$sms=$fname . " your Major is ". $row['major']. ". Karibu sana Goghoyo";
			$this->sendSms($from,$sms);
		}
	}
	
	function sendRegistrationMessage($to,$msg){
		$this->sendSms($to,$msg);
	}
	
	//send information
	function sendInfo($from){
		$msg="Only send: GPA SID or Major SID";
		
		$this->sendSms($from,$msg);
	}
	//function to redirect request to respective functions
	function smsGate(){
		$secret=$_REQUEST['secret'];
		$msg=$_REQUEST['message'];
		$sender=$_REQUEST['contact']; //get the sender details with ID, Name and Number as Keys
		$msgArray=explode(" ",$msg); //split the message body into an array
		$benso='+233542615890';
		$mimi='+233542614920';
		$from=$sender['Number']; //get the sender number from the multidimensional array
		$number="0".base_convert($sender,10,8); //convert octal number back to decimal and add 0
		if($secret==="1234"){ //check the secret code sent by the gateway
		$this->sendSms($mimi,$benso);
			$starts=$msgArray[0];
			
			if($starts==="major"){ //if the first word is major, get the id and send it to send major method
				$sid=$msgArray[1];
				$this->sendMajor($benso,$number); //method to send major
			}
			else if($starts==="gpa"){ //call send gpa method
				$sid=$msgArray[1];
				$this->sendGpa($number,$sid);
			}
			if($starts==="register"){ //activate registration
				$this->registerFromSms($number,$msgArray);
			}
			else{ //send info msg
				$this->sendInfo($number);
			}
		}
	}
	function smsGate2(){
		
		$benso='+233542615890';
		$mimi='+233542614920';
		$secret=$_REQUEST['secret'];
		if($secret==="1234"){ //check the secret code sent by the gateway
		$this->sendSms($mimi,$benso);
			
			
		$this->sendInfo($mimi);
			
		}
	}
}
 $messenger= new send();

 if(isset($_REQUEST['cmd'])){
	 $cmd=$_REQUEST['cmd'];
	 
     switch ($cmd) {
        case 1:
           $messenger->addRecord(); //add record from web page and send sms
           break;

        case 2:
            $messenger->getRecords(); //get all the records
            break;
        case 3:
			$messenger->getRecord(); //get a single record
			break;
		
		case 4:
			$messenger->sendSms2(); //send a dummy msg
			break;
		
		case 5:
			$messenger->smsGate2(); //decide where the message should go
			break;
		case 6:
			$messenger->sendMajor('+233504169918','74232018');
		
         default:
             $messenger->smsGate(); //decide where the message should go
             break;
     }
	 
 }
	 $messenger->smsGate2(); //decide where the message should go

?>





