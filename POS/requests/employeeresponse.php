<?php
if(isset($_REQUEST['cmd'])){
	$cmd=$_REQUEST['cmd'];

	function getEmployees(){
		include_once("employee.php");
		$employee=new employee();

		if($employee->getEmployees){
			$row=$employee->fetchArray();
			echo '{"results":1,"employees":[';
			while($row){
				echo json_encode($row);
				if($row=$employee->fetchArray()){
					echo ',';
				}
			}
			echo ']}';
		}
	}

	switch ($cmd) {
		case 1:
			getEmployees();
			break;
		
		default:
			# code...
			break;
	}
}

?>