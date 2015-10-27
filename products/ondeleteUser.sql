CREATE  TRIGGER deleted_users
AFTER DELETE  ON users
   
FOR EACH ROW
   

   -- Insert record into audit table
   
   INSERT INTO deleted_users
    set user_id=old.user_id,
     user_name=old.user_name,
     user_type=old.user_type,
     user_pass=old.user_pass;
	 

      
