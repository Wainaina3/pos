	function sendRequest(u){
		// Send request to server
		//u a url as a string
		//async is type of request
		var obj=$.ajax({url:u,async:false});
		//Convert the JSON string to object
		var result=$.parseJSON(obj.responseText);
		//	alert("request sent");
		return result;	//return object

	}

	function courseOutlines(){

		var results=sendRequest("manipulation.php?cmd=2");
		var tbl= document.getElementById("course_outlines");

		if(results.result!=0){		


			for(i=0;i<results.outlines.length;i++){
				if(results.outlines[i].course_dept=='cs'){
					cs=document.getElementById("csTable");
					csrow=cs.rows.length;
					row=cs.insertRow(csrow);
					cid=row.insertCell(0);
					cname=row.insertCell(1);
					cid.innerHTML="<a href='viewCourses.php?id="+results.outlines[i].course_id +"'>"+results.outlines[i].course_id +"</a>";;
					cname.innerHTML="<a href='viewCourses.php?id="+results.outlines[i].course_id +"'>"+results.outlines[i].course_name +"</a>";

				}
				else if(results.outlines[i].course_dept=='as'){
					as=document.getElementById("asTable");
					asrow=as.rows.length;
					row=as.insertRow(asrow);
					cid=row.insertCell(0);
					cname=row.insertCell(1);
					cid.innerHTML="<a href='viewCourses.php?id="+results.outlines[i].course_id +"'>"+results.outlines[i].course_id +"</a>";
					cname.innerHTML="<a href='viewCourses.php?id="+results.outlines[i].course_id +"'>"+results.outlines[i].course_name +"</a>";
				}
				else if(results.outlines[i].course_dept=='ba'){
					ba=document.getElementById("baTable");
					barow=ba.rows.length;
					row=ba.insertRow(barow);
					cid=row.insertCell(0);
					cname=row.insertCell(1);
					cid.innerHTML="<a href='viewCourses.php?id="+results.outlines[i].course_id +"'>"+results.outlines[i].course_id +"</a>";
					cname.innerHTML="<a href='viewCourses.php?id="+results.outlines[i].course_id +"'>"+results.outlines[i].course_name +"</a>";

				}
				else if(results.outlines[i].course_dept='eng'){
					eng=document.getElementById("engTable");
					engrow=eng.rows.length;
					row=eng.insertRow(engrow);
					cid=row.insertCell(0);
					cname=row.insertCell(1);
					cid.innerHTML="<a href='viewCourses.php?id="+results.outlines[i].course_id +"'>"+results.outlines[i].course_id +"</a>";
					cname.innerHTML="<a href='viewCourses.php?id="+results.outlines[i].course_id +"'>"+results.outlines[i].course_name +"</a>"; 
				}
			}
		}
	}
	//validating empty fields
	function check_empty () {
		// body...
		if (document.getElementById('name').value == "" || document.getElementById('email').value == "" ||
			document.getElementById('msg').value == "") {

			var obj = document.getElementById("name");
		var str = obj.value;
		if(str.length<=0){
			obj.style.backgroundColor ="green";

		}else{
			obj.style.backgroundColor ="red";
		}
		return false;

			// alert("Fill all fields!");
		}else{
			// document.getElementById('form').submit();
			// alert("Form submitted successfully...");
			return true;
		}
	}

	//function to display popup
	function div_show(){
	
		document.getElementById('abc').style.display = "block";
		document.getElementById('popupContact').style.display = "block";
		document.getElementById("form").reset();
	}

	function div_show2(data){
		// alert(data);
		
		$.get( 
			"dept_func.php", { act: 3, did:data},
			function(data) {
				document.getElementById('abc').style.display = "block";
				document.getElementById('popupEdit').style.display = "block";
				
				$("#name").val(data[0]['Department_Id']);
				$("#name").focus();
				document.form2.name.disabled=true;
				$("#email").val(data[0]['Department_Name']);
				$("#email").focus();
				$("#msg").val(data[0]['Dept_HOD']);
				$("#msg").focus();


			}, "json");

	// alert(data);
}

	//function to hide popup
	function div_hide(){
		document.getElementById('abc').style.display = "none";
		document.getElementById('popupContact').style.display = "none";
	}
	


	//function to hide popup
	function div_hide2(){
		document.getElementById('abc').style.display = "none";
		document.getElementById('popupEdit').style.display = "none";
	}

	function add_dept(){
		var id = document.getElementById('depId').value;
		var name =  document.getElementById('depName').value;
		var hod =  document.getElementById('hod').value;

		$.get( 
			"dept_func.php", { act: 1,did: id, dname: name, dhod: hod},
			function(data) {
				if($("#test").html()!=""){
					$("#test").html("");
					view_dept();
				}
				if(data){
					$("#divStatus").html(data);
					$("#divStatus").css("color", "green");
				}
				document.getElementById("form").reset();
			});

	}

	function update_dept(){
		var id = document.getElementById('name').value;
		var name =  document.getElementById('email').value;
		var hod =  document.getElementById('msg').value;

		$.get( 
			"dept_func.php", { act: 4,did: id, dname: name, dhod: hod},
			function(data) {
				$("#test").html("");
				view_dept();
				if(data){
					$("#divStatus").html(data);
					$("#divStatus").css("color", "green");
				}
			});
		
	}

	function del_dept(id){
		
		$.get( 
			"dept_func.php", { act: 5,did: id},
			function(data) {
				if($("#test").html()!=""){
					$("#test").html("");
					view_dept();
				}
				if(data){
					$("#divStatus").html("Data deleted!");
					$("#divStatus").css("color", "green");
				}
				
			});

	}



	function view_dept(){
		if($("#test").html()!=""){
			$("#test").html("");
			$("#viewh").html("View");
		}else{
			$("#viewh").html("Hide");
			$.get( 
				"dept_func.php", {act: 2},
				function(data) {

					$("#test").html("");

					var body=document.getElementById('test');
					var tbl=document.createElement('table');
					tbl.className += "centered";
					tbl.style.width='100%';
					tbl.setAttribute('border','0');
					var tbdy=document.createElement('tbody');
					var tr=document.createElement('tr');
					tr.style="background-color:black; color:white";
					var cell = tr.insertCell();
					cell.align="center";
					cell.innerHTML="<b>Department ID</b>";
					var cell = tr.insertCell();
					cell.align="center";
					cell.innerHTML="<b>Department Name</b>";
					var cell = tr.insertCell();
					cell.align="center";
					cell.innerHTML="<b>Dept HOD</b>";
					var cell = tr.insertCell();
					var cell = tr.insertCell();
					tbdy.appendChild(tr);
					for(var i=0;i<data.length;i++){

						var tr=document.createElement('tr');
						if(i%2==0){
							tr.style="background-color:#EEEEEE";
						}
						var cell = tr.insertCell();
						cell.align="center";
						cell.innerHTML=data[i]["Department_Id"];
						var cell = tr.insertCell();
						cell.align="center";
						cell.innerHTML=data[i]["Department_Name"];
						var cell = tr.insertCell();
						cell.align="center";
						cell.innerHTML=data[i]["Dept_HOD"];
						var cell = tr.insertCell();
						cell.align="center";
						cell.innerHTML="<span><a href='#' onclick=div_show2('"+data[i]['Department_Id']+"') >Edit</a></span>";
						var cell = tr.insertCell();
						cell.align="center";
						cell.innerHTML="<span><a href='#' onclick=del_dept('"+data[i]['Department_Id']+"')>Delete</a></span>";
						tbdy.appendChild(tr);
					}

					tbl.appendChild(tbdy);
					body.appendChild(tbl);

				},"json");}

}

function get_deptByName(){
		// if($("#test").html()!=""){
		// 	$("#test").html("");
		// }else{
			var name =  document.getElementById('txtSearch').value;
			
				$.get( 
					"dept_func.php", {act: 6, dname: name},
					function(data) {

						$("#test").html("");

						var body=document.getElementById('test');
						var tbl=document.createElement('table');
						tbl.className += "centered";
						tbl.style.width='100%';
						tbl.setAttribute('border','0');
						var tbdy=document.createElement('tbody');
						var tr=document.createElement('tr');
						tr.style="background-color:black; color:white";
						var cell = tr.insertCell();
						cell.align="center";
						cell.innerHTML="<b>Department ID</b>";
						var cell = tr.insertCell();
						cell.align="center";
						cell.innerHTML="<b>Department Name</b>";
						var cell = tr.insertCell();
						cell.align="center";
						cell.innerHTML="<b>Dept HOD</b>";
						var cell = tr.insertCell();
						var cell = tr.insertCell();
						tbdy.appendChild(tr);
						for(var i=0;i<data.length;i++){

							var tr=document.createElement('tr');
							if(i%2==0){
								tr.style="background-color:#EEEEEE";
							}
							var cell = tr.insertCell();
							cell.align="center";
							cell.innerHTML=data[i]["Department_Id"];
							var cell = tr.insertCell();
							cell.align="center";
							cell.innerHTML=data[i]["Department_Name"];
							var cell = tr.insertCell();
							cell.align="center";
							cell.innerHTML=data[i]["Dept_HOD"];
							var cell = tr.insertCell();
							cell.align="center";
							cell.innerHTML="<span><a href='#' onclick=div_show2('"+data[i]['Department_Id']+"') >Edit</a></span>";
							var cell = tr.insertCell();
							cell.align="center";
							cell.innerHTML="<span><a href='#' onclick=del_dept('"+data[i]['Department_Id']+"')>Delete</a></span>";
							tbdy.appendChild(tr);
						}

						tbl.appendChild(tbdy);
						body.appendChild(tbl);

					},"json");


}



