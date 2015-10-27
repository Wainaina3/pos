/*
create a table for rooms
*/

create table if not exists rooms(
room_id int not null auto_increment,
room_number varchar(100) not null,
primary key(room_id)
)Engine=InnoDb charset=latin1 auto_increment=3;