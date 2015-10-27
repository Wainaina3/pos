
/*create table to store deleted users
*/

create table if not exists deleted_users(
user_id varchar(250) not null,
user_name varchar(250) not null,
user_type varchar(250) not null,
user_pass varchar(250) not null,
primary key(user_id)
) ENGINE=innoDb;

