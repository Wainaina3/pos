<?php
include_once("adb.php");
class bookings extends adb{

//create a booking
public function create_booking($room_number1, $start_time,$end_time, $booked_date1,$booker_name1,$booker_phone1,
	$booker_email1,$booking_title1){
$sqlScript="insert into booking set room_number='$room_number1',start_time='$start_time', end_time='$end_time',booked_date='$booked_date1',
booker_name='$booker_name1',booker_phone='$booker_phone1',booker_email='$booker_email1',booking_title='$booking_title1'";
return $this->query($sqlScript);
}

//delete a booking
public function delete_booking($booking_id){
	$sqlScript="delete from booking where book_id=$booking_id";

	return $this->query($sqlScript);
}

//update a booking
public function update_booking($booking_id,$room_number, $start_time,$end_time, $booked_date,$booker_name,$booker_phone,
	$booker_email,$booking_title){
$sqlScript="update booking set room_number='$room_number',start_time='$start_time',end_time='$end_time',booked_date=$booked_date,
booker_name='$booker_name',booker_phone='$booker_phone',booker_email='$booker_email',booking_title='$booking_title' where book_id=$booking_id";

return $this->query($sqlScript);
}

public function get_all_bookings(){
	$script="select * from booking";
	
	return $this->query($script);
}

//get a booking given the booking id
public function get_booking($booking_id){
$sqlScript="select * from booking where book_id=$booking_id";

return $this->query($sqlScript);
}

//get a welcome page maquee info
public function get_maquee($booking_id){
	$sqlScript="select room_number,booked_time,booking_title from booking where book_id=$booking_id order by booked_time,room_number";

	return $this->query($sqlScript);
}

public function convert_time($time){
	$arr=explode(":",$time,2);
	$minutes_after_midnight=($arr[0]*60) + $arr[1];
	
	return $minutes_after_midnight;
}

public function find_time($minutes_after_midnight){
	$hours=floor($minutes_after_midnight/60);
	$minutes=fmod($minutes_after_midnight,60);
	
	$time="$hours" . ":" . "$minutes";
	return $time;
}

public function get_time($time){
	$arr=explode(":",$time);
	$hrs=$arr[0];
	if($hrs>12){
		$hrs=$hrs-12;
	}
	return "$hrs" . ":" . "$arr[1]";
}

public function find_pm_am($time){
	$arr=explode(":",$time);
	$hrs=$arr[0];
	if($hrs>12){
		$twelvehrs=PM;
	}
	else
		$twelvehrs=AM;
	
	return $twelvehrs;
}
}

?>