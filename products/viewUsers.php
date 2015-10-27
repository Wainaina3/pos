<?php
session_start();
if(!isset($_SESSION["user_name"])){
header("location:login.php");
}
else{
	
// print_r($_SESSION["user_name"]);
// print_r($_SESSION["user_id"]);
}

?>

<html>
	<head>
		<title>Users</title>
		<link rel="stylesheet" href="css/style.css">
		<script src="jquery_1.5.min.js"></script>
		<script>
			function sendRequest(u){
				// Send request to server
				//u a url as a string
				//async is type of request
				var obj=$.ajax({url:u,async:false});
				//Convert the JSON string to object
				var result=$.parseJSON(obj.responseText);
				return result;	//return object
				
			}
			
			function search(){
				var search_text=txtSearch.value;

				var strUrl="userManipulation.php?cmd=4&st="+search_text;

				var objResult=sendRequest(strUrl);



				if(objResult.result==0){
					$("#divStatus").text(objResult.message);
					return;
				}
				userTable=document.getElementById("userTable");
				
				rowNum=userTable.rows.length;
				for(i=rowNum;i>1;i--){
					userTable.deleteRow(i-1);
				}

				for (i = 0; i < objResult.users.length; i++) { 

					
   					rowNum=userTable.rows.length;
					var row=userTable.insertRow(rowNum);
					
					if(i%2==0){
					row.style.backgroundColor="Khaki";
					}

					var check=row.insertCell(0);
					var username=row.insertCell(1);
					var userType=row.insertCell(2);
					var userId=row.insertCell(3);
					var edit=row.insertCell(4);

					check.innerHTML="<input type=checkbox>";
					username.innerHTML=""+objResult.users[i].user_name;
					userType.innerHTML="" +objResult.users[i].user_type;
					userId.innerHTML="" +objResult.users[i].user_id;
					edit.innerHTML="<span onclick='deleteUser("+objResult.users[i].user_id +")'>Delete</span>";
					//edit.innerHTML='<a href="http://your.domain.tld">Link Title</a>'
				}


                 
				
					
			}
		
		</script>
	</head>
	<body>
		<table>
			<tr>
				<td colspan="2" id="pageheader">
					Application Header
				</td>
			</tr>
			<tr>
				<td id="mainnav">
					<div class="menuitem">menu 1</div>
					<div class="menuitem">menu 2</div>
					<div class="menuitem">menu 3</div>
					<div class="menuitem">menu 4</div>
				</td>
				<td id="content">
					<div id="divPageMenu">
						<span class="menuitem" >Add User</span>
						<span class="menuitem" >page menu 2</span>
						<span class="menuitem" >page menu 3</span>
						
						<input type="text" id="txtSearch" >
				
						<span class="clickspot" onclick="search()">Search</span>
						
						
						 		
					</div>
					<div id="divStatus" class="status">
						status message
					</div>
					<div id="divContent">
						Content space
						<span class="clickspot">click here </span>
						<?php
							include_once("users.php");
	
							$obj=new users();
							
							$obj->getUsers();
							
							echo "<table border='1' id='userTable'>";
							echo "<tr style='background-color:olive; color:white; text-align:center'><td></td><td>User Name</td><td>User Type</td><td>User Id</td><td></td></tr>";
							
							$row=$obj->fetch();
							$style="";
							$i=0;
							while($row){
								if($i%2==0){
									$style="style='background-color:Khaki'";
								}else{
									$style="";
								}
								echo "<tr $style >";
								echo "<td><input type='checkbox' id=''users[]' name='users[]' value='{$row['user_id']}'></td>";
								echo "<td><span class='clickspot'>{$row['user_name']}</span></td>";
								echo "<td>{$row['user_type']}</td> <td>{$row['user_id']}</td>";
								echo "<td><a href=''>edit</a> <a href=''>delete</a></td>";
								echo "</tr>";
								$row=$obj->fetch();
								$i++;
							}
						?>
					</div>
				</td>
			</tr>
		</table>
		<div id="divDesc" style="display:none;position:absolute;top:0;left:0">
			this a div
		</div>

			
	</body>
</html>	




