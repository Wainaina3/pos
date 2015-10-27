<?php

?>
<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<link href="css/elements.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	
	<script>
		$( document ).ready(function(){
			$(".button-collapse").sideNav();
		})

		function logout(){

			$.get(
				"user_func.php", {act:2},
				function(data){
					window.location="login.html";				

				});
		}

	</script>
</head>
<body>



	<div class="container">
		<div class="row">
			<div class="col-lg-12"><h2 id="logo">Course Repository</h2></div>
		</div>

		<nav>
			<div class="nav-wrapper" id="navlo">

				<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
				<ul class="right hide-on-med-and-down">
					<li><a href="coursev.php">Course Outline</a></li>
					<li><a href="faculView.php">Faculty</a></li>
					<li><a href="dept_form.php">Department</a></li>
					<li><a href="" onclick="logout()">Logout</a></li>
				</ul>
				<ul class="side-nav" id="mobile-demo">
					<li><a href="coursev.php">Course Outline</a></li>
					<li><a href="faculView.php">Faculty</a></li>
					<li><a href="dept_form.php">Department</a></li>
					<li><a href="" onclick="logout()">Logout</a></li>
				</ul>
			</div>
		</nav>


		<div class="row" style="padding:5%; ">

			<div class="col s4">
				<!-- <img src="images/course.png" width="85%"> -->
				
				<div class="card" style="background-color:gray; height:75% ">
					<div class="card-image">
						<a href="coursev.php"><img src="images/course.png" width="75%" ></a>
					</div>
					<div class="card-content">
						<span class="card-title"><h5 ><a href="coursev.php" style="color:black;">Course Outline</a></h5></span>

						<p>I am a very simple card. I am good at containing small bits of information.
							I am convenient because I require little markup to use effectively.</p>
						</div>
						<div class="card-action">
							<a href="coursev.php">Have a look</a>
						</div>
					</div>

				</div>
				<div class="col s4">
					
					<div class="card" style="background-color:gray; height:75% ">
						<div class="card-image">
							<a href="faculView.php"><img src="images/faculty.png" width="75%" ></a>						
						</div>
						<div class="card-content">
							<span class="card-title"><h5><a href="faculView.php"  style="color:black; ">Faculty</a></h5></span>
							<p>I am a very simple card. I am good at containing small bits of information.
								I am convenient because I require little markup to use effectively.</p>
							</div>
							<div class="card-action">
								<a href="faculView.php">Have a look</a>
							</div>
						</div>
					</div>
					<div class="col s4">
						<div class="card" style="background-color:gray; height:75%; width:105%;" >
							<div class="card-image" width="65%">
								<a href="dept_form.php"><img src="images/dep.png" width="75%"></a>

							</div>
							<div class="card-content">
								<span class="card-title"><h5><a href="dept_form.php"  style="color:black;">
									Department</a></h5></span>
									<p>I am a very simple card. I am good at containing small bits of information.
										I am convenient because I require little markup to use effectively.</p>
									</div>
									<div class="card-action">
										<a href="dept_form.php">Have a look</a>
									</div>
								</div>
							</div>

						</div>

		
		</body>
		</html>	