<?php
include_once("adb.php");

public class rooms extends adb{

	//create a room
	public function create_room($room_number){
		$sqlScript="insert into rooms set room_number=$room_number";

		return $this->query($sqlScript);
	}

	//update a room
	public function update_room($room_id,$room_number){
		$sqlScript="update rooms set room_number=$room_number where room_id=$room_id";

		return $this->query($sqlScript);
	}

	//delete a room
	public function delete_room($room_id){
		$sqlScript="delete from rooms where room_id=$room_id";

		return $this->query($sqlScript);
	}

	//show all rooms
	public function show_rooms(){
		$sqlScript="select * from rooms";

		return $this->query($sqlScript);
	}

	//show a room
	public function show_room($room_id){
		$sqlScript="select * from rooms where room_id=$room_id";

		return $this->query($sqlScript);
	}

	//search for a room
	public function search_room($room_number){
		$sqlScript="select * from rooms where room_number like %$room_number%";

		return $this->query($sqlScript);
	}
}



?>