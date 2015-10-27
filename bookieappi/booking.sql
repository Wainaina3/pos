
/*Create table to store bookings in the database
*/
create table if not exists booking(
book_id int(11) not null AUTO_INCREMENT,
room_number varchar(100) not null,
start_time int not null,
end_time int not null,
booked_date date not null,
booker_name varchar(200) not null,
booker_phone varchar(250) not null,
booker_email varchar(250) not null,
booking_title varchar(200) not null,
primary key(book_id)
)ENGINE=InnoDb DEFAULT CHARSET=latin1 AUTO_INCREMENT=3;