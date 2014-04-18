<?php

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$leaveDetailId = $_GET['leaveDetailId'];
		$comment=$_GET['comment'];
		if(!empty($leaveDetailId)){
			
			require_once 'connect.inc.php';

			connect_db('logincredentialsdb');
 

			$query = "UPDATE leave_details_tb SET leaveStatus='2', commentByRecommending='$comment' WHERE leaveDetailId='$leaveDetailId'";

			if($query_run = mysql_query($query)){
				echo "Application Recommended";
			}else{ 
				echo "Failed to recommend application";
			}
		}
	}

?>