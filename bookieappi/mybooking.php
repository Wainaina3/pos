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
					<select >
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
				<div>Date:<input type= "date" id="datepicker" size="30"></div>
				<table >
						<tr>
							<td>
								<div>Start time:<input type= "time" name="time" class="timepicker" size="15" placeholder="00:00">
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
								<div>End time:<input type= "time" name="time" class="timepicker" size="15" placeholder="00:00"></div>
								
							</td>
							<td>
								<div id="amSelect">am/pm:<select>
									<option value="0">--</option>
									<option value="AM">AM</option>
									<option value="PM">PM</option>
								</select>
								</div>
							</td>
						</tr>
					</table>
				<div>Name:<input type= "text" name="n" size="30"></div>
				<div>Phone:<input type= "text" name="n" size="30" pattern="[0-9]*"></div>
				<div>Email:<input type= "email" name="n" size="30"></div>
				<div>Title:<input type= "text" name="n" size="30"></div>
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

						<li><input class ="domain" type="text" id="txtSearch" placeholder="search "/>
						<button id="txtSearchBtn">search</button></li>
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
								<td width= "50" >Booking Id</td>
								<td width= "50">Room Number </td>
								<td width= "80">Booked Time </td>
								<td width= "100">Booked Date</td>
								<td width= "140">Booker Name</td>
								<td width= "120">Booker Phone Number</td>
								<td width= "140">Booker Email</td>
								<td width= "140">Booking Title</td>
								<td width= "50">Edit</td>
								<td width= "50">Delete</td>
							</tr>
							</td>
			
		</table>
						<!-- </table> -->
							<?php
							//include_once("bookingServer.php");
							
							//$booking=new bookings();
							//echo $booking->get_all_bookings();
							//$style="";
							 //$count=0;
							 //echo "<tr style='background-color:blue;color:white; text-align:center'>";
						//	while($row=$booking->fetch()){
						//		if($count%2==0){
						//		$style="style='background-color: #C2FFFF'";	
						//		}
						//		else{
						//			$style="";
						//		}
						//		$count+=1;
						//		echo "<tr $style>";
						//		echo "<tr> ";
						//		echo "<td> {$row['book_id']} </td> <td> {$row['room_number']}</td> <td> {$row['booked_time']} </td> <td> {$row['booked_date']} </td> <td> {$row['booker_name']} </td> <td> {$row['booker_phone']} </td> <td> {$row['booker_email']} </td> <td> {$row['booking_title']} </td>";
						//		echo "</tr>";
						//	}
//
//							echo "</table>";
							?>
							

					</div>
				

		</div>
		<?php
	include_once("bookingServer.php");
	$room=NULL;
	$sqltime=NULL;
	$sqldate=NULL;
	$name=NULL;
	$phone=NULL;
	$email=NULL;
	$title=NULL;
	
	 $book=new bookings();

	if(isset($_REQUEST['room'])){
		$room=$_REQUEST['room'];
		
		echo $room;
	}

	if(isset($_REQUEST['date'])){
	
		$userdate=$_REQUEST['date'];
		//$datestamp = DateTime::createFromFormat('d/m/Y', $userdate);
		$sqldate = date('Y-m-d', strtotime($userdate));
		//$sqldate=$datestamp->format('Y-m-d');

	
	}
	if(isset($_REQUEST['time'])){
	
		$sqltime=$book->convert_time($_REQUEST['time']);

	}
	if(isset($_REQUEST['name'])){
	
		$name=$_REQUEST['name'];
	}
	if(isset($_REQUEST['phone'])){
	
		$phone=$_REQUEST['phone'];
	}
	if(isset($_REQUEST['email'])){
		
		$email=$_REQUEST['email'];
	}
	if(isset($_REQUEST['title'])){
	
		$title=$_REQUEST['title'];
	}


	echo  $book->create_booking($room,$sqltime,$sqldate,$name,$phone,$email,$title);

	?>

			<!-- <div id="footer">
				<p>Footer at the bottom</p>

			</div> -->
	</body>
</html>	