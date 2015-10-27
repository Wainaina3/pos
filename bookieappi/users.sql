/*
*create a table for bookie app users
*/

create table if not exists users(
user_id int(11) not null AUTO_INCREMENT,
first_name varchar(100) not null,
last_name varchar(150) not null,
email varchar(255) not null,
password varchar(200) not null,
primary key(user_id)
)Engine=InnoDb DEFAULT CHARSET=latin1 AUTO_INCREMENT=3;


