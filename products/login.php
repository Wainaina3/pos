<html>
	<head>
	
	</head>
	
	<body>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?> " method="POST"> 
	<input type="text" name="username" id="username" size="30">
	<input type="text" name="userpass" id="userpass" size="30">
	<input type="submit" value="Login" >
	</form>
	
	<?php
	include("users.php");
	if(!empty($_REQUEST['username'])){
	$obj=new users();
	$usname=$_REQUEST['username'];
	$uspass=$_REQUEST['userpass'];

	$sql="select * from users where user_name='$usname' and user_pass='$uspass'";
	$obj->query($sql);
	$res=$obj->fetch();
	if(isset($res['user_name'])){

		session_start();
		$_SESSION['user_name']=$res['user_name'];
		$_SESSION['user_type']=$res['user_type'];
		$_SESSION['user_id']=$res['user_id'];

		
		header('location:search.php');
		echo "<script> window.locatioin='search.php' </script>";

	

	}

	echo "Wrong User name or password";
	}
	
	?>
	</body>

</html>