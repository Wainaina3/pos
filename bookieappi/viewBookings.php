<!doctype html>

<html>
<title>
View Bookings
</title>

<head>
<h1> Bookings made</h1>
</head>

<body>
<?php
include_once("bookingServer.php");
echo "<table border=1> <tr><td>Booking Id </td> <td> <b> Room Number <b> </td> <td> Booked Time </td> <td>
Booked Date</td> <td> Booker Name </td> <td> Booker Phone Number</td> <td> Booker Email</td> <td> Booking Title </td> </tr>";
$booking=new bookings();
echo $booking->get_all_bookings();

while($row=$booking->fetch()){
	echo "<tr> ";
	echo "<td> {$row['book_id']} </td> <td> {$row['room_number']}</td> <td> {$row['booked_time']} </td> <td> {$row['booked_date']} </td> <td> {$row['booker_name']} </td> <td> {$row['booker_phone']} </td> <td> {$row['booker_email']} </td> <td> {$row['booking_title']} </td>";
	echo "</tr>";
}

echo "</table>";


?>

</body>


</html>