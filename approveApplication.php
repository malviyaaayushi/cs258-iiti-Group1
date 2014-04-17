<?php

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$leaveDetailId = $_GET['leaveDetailId'];
		$comment=$_GET['comment'];
		if(!empty($leaveDetailId)){
			require_once 'connect.inc.php';
		
			connect_db('logincredentialsdb');
	
			$query = "UPDATE leave_details_tb SET leaveStatus='3', commentByApproving='$comment' WHERE leaveDetailId='$leaveDetailId'";
	
			if($query_run = mysql_query($query)){
				echo "Application Approved";
			}else{
				echo mysql_error();
				echo "Failed to approve application";
			}
		}
		else
			echo 'Some problem occured';
	}

?>