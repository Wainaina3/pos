<!doctype html>
<html>
	<head>
		<title>Home</title>
		<meta charset="utf-8">
    <link rel="stylesheet" href="css/nivo-slider.css" media="screen">
    <!-- jQuery & Nivo Slider -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
		<script src="js/book.js"></script>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/style_index.css">
		<link rel="stylesheet" href="css/style_book.css">
		<link rel="stylesheet" href="css/style_popup.css" >

			
	<script>
	  $(document).ready(function() {
	    $("#datepicker").datepicker();
	     $("#datepickerf").datepicker();
	      $("#datepickert").datepicker();
	  });

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

		


  </script>
  <style type="text/css">
  	#roomSelect select {
        width:300px;
        height: 30px;
        vertical-align: middle;
	}
	#amSelect select {
        width:40px;
        height: 30px;
        vertical-align: middle;
	}
	#datepickerf{
		height: 30px;
		border-radius: 5px;
		border: none;
			}
	#datepickert{
		height: 30px;
		border-radius: 5px;
		border: none;
	}
  </style>
	</head>

	<body>
	<div id="boxes">
	    
	    <!-- #customize your modal window here -->
	    <div id="dialog" class="window">
	        <form action="<?php echo $_SERVER['PHP_SELF']; ?>"method="POST">
				<div id="roomSelect">Room:
					<select name="room">
						<option value="0"></option>
						<option value="LH 115">LH 115</option>
						<option value="LH 116">LH 116</option>
						<option value="LH 216">LH 216</option>
						<option value="LH 217">LH 217</option>
						<option value="LH 218">LH 218</option>
						<option value="LIB 301">LH 301</option>
						<option value="LIB 302">LH 302</option>
						<option value="COURTYARD">COURTYARD</option>
						<option value="AMPHITHEATER">AMPHITHEATER</option>
					</select>
				</div>
				<div>Date:<input type= "date" id="datepicker" name="datepicker" size="30"></div>
				<table >
						<tr>
							<td>
								<div>Start time:<input type= "time" name="start_time" class="timepicker" size="15" placeholder="00:00">
								</div>
							</td>
							<td>
								<div id="amSelect">am/pm:<select>
									<option value="0">--</option>
									<option value="AM">AM</option>
									<option value="PM">PM</option>
								</select>
								</div>
							</td>
							<td>
								<div>End time:<input type= "time" name="end_time" class="timepicker" size="15" placeholder="00:00"></div>
								
							</td>
							<td>
								<div id="pmamSelect">am/pm:<select>
									<option value="0">--</option>
									<option value="AM">AM</option>
									<option value="PM">PM</option>
								</select>
								</div>
							</td>
						</tr>
					</table>
				<div>Name:<input type= "text" name="booker_name" size="30"></div>
				<div>Phone:<input type= "text" name="booker_phone" size="30" pattern="[0-9]*"></div>
				<div>Email:<input type= "email" name="booker_email" size="30"></div>
				<div>Title:<input type= "text" name="booking_title" size="30"></div>
				<div id="mybtn">
					<table >
						<tr>
							<td>
								<div id= "btn1"><input type= "submit" value="Cancel"name="btn_cancel"
									style="font-size:15pt;color:white;background-color:#8D1919;border:2px solid #336600;padding:3px">
								</div>
								</td>
								<td>
								<div id ="btn2"><input type= "submit" value="Book"name="btn_submit" 
									style="font-size:15pt;color:white;background-color:#8D1919;border:2px solid #336600;padding:3px">
								</div>
							</td>
						</tr>
					</table>
				</div>
			</form>
	        
	        <!-- close button is defined as close class -->
	         <a style="color: #CC0000" background: "#b9b9b9" href="#" class="close"><h3>Close</h3></a>
	    </div>
							    <!-- Do not remove div#mask, because you'll need it to fill the whole screen -->    
	     <div id="mask"></div>
		</div>
		<div id ="container2">
		<table>
			<tr>
				<td colspan="2" id="pageheader">
			<div id="header">
					<div id="icon">
						<a href="index.html"><img src="images/icon1.png" width="50" height="50"></a>
					</div>
					<div id="Topname">
						<h3>BOOKIE</h3>
					</div>
					<div id="login">
						<button id= "lbtn">LOGOUT</button>
					</div>
			</div>
				</td>
			</tr>
			<tr>/
				<td id="mainnav">
					<div class="menuitem">menu 1</div>
					<div class="menuitem">menu 2</div>
					<div class="menuitem">menu 3</div>
					<div class="menuitem">menu 4</div>
				</td>
				<td id="content">
					<div id="divPageMenu">
					<ul>
						<li><a href="home.php" name="home">HOME</a></li>
						<li><a href="#dialog" name="modal">BOOK</a></li>
						<li><a href="mybooking.php" name="viewBooking">MY BOOKINGS</a></li>

						<li><input class ="domain" type="text" id="txtSearch" name="txtSearch" placeholder="search "/>
						<button id="txtSearchBtn" onClick="searchBooking()">search</button></li>
						</ul>
					</div>
					
					<div id="divContent">
						<span class="clickspot">
							<table>
								<tr>
									<td>
										From:<input type= "date" id="datepickerf" size="20"></div>
									</td>
									<td>
										To:<input type= "date" id="datepickert" height="10" size="20"></div>
									</td>
									<td>
										<button id="viewBtn">View</button>
									</td>
							</tr>
							</table>
						<table  boarder= 2 align ="center" id="tableExample" class="reportTable" >
							<tr class="header">
								<td width= "100" >Booking Id</td>
								<td width= "100">Room Number </td>
								<td width= "100"> Booked Time </td>
								<td width= "120">Booked Date</td>
								<td width= "140">Booker Name</td>
								<td width= "120">Booker Phone Number</td>
								<td width= "140">Booker Email</td>
								<td width= "140">Booking Title</td>
							</tr>
							</td>

								 <?php
							include_once("bookingServer.php");
							
							$booking=new bookings();
							 $booking->get_all_bookings();
							$style="";
							 $count=0;
							 echo "<tr style='background-color:blue;color:white; text-align:center'>";
							while($row=$booking->fetch()){
								if($count%2==0){
								$style="style='background-color: #C2FFFF'";	
								}
								else{
									$style="";
								}
								$count+=1;
								echo "<tr $style>";
								echo "<td> {$row['book_id']} </td> <td> {$row['room_number']}</td> 
								<td> {$row['start_time']} - {$row['end_time']} </td> <td> {$row['booked_date']} </td> 
								<td> {$row['booker_name']} </td> <td> {$row['booker_phone']} </td>
								 <td> {$row['booker_email']} </td> <td> {$row['booking_title']} </td>";
								echo "</tr>";
							}
						
							?>
			
		</table>
						
					</div>
				

		</div>

		<?php
	include_once("bookingServer.php");
	
	 $book=new bookings();

if(!empty($_REQUEST['room']) && !empty($_REQUEST['datepicker']) && !empty($_REQUEST['start_time']) && !empty($_REQUEST['end_time'])&& !empty($_REQUEST['booker_name'])&&
		!empty($_REQUEST['booker_phone'])&& !empty($_REQUEST['booker_email']) && !empty($_REQUEST['booking_title']) ){
		$room=$_REQUEST['room'];
		$title=$_REQUEST['booking_title'];
		$userdate=$_REQUEST['datepicker'];
		//$datestamp = DateTime::createFromFormat('d/m/Y', $userdate);
		$sqldate = date('Y-m-d', strtotime($userdate));
		//$sqldate=$datestamp->format('Y-m-d');
		$email=$_REQUEST['booker_email'];
		$phone=$_REQUEST['booker_phone'];
		$name=$_REQUEST['booker_name'];
		$start_time=$book->convert_time($_REQUEST['start_time']);
		$end_time=$book->convert_time($_REQUEST['end_time']);

		 $book->create_booking($room,$start_time,$end_time,$sqldate,$name,$phone,$email,$title);
	}
	
	?>
	</body>
</html>	
