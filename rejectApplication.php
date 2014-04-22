<?php

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {

		$leaveDetailId = $_GET['leaveDetailId'];
		$comment=$_GET['comment'];
		include 'core/init.php';
		$user = new user();
		$userId = $user->data()->id;

		if(!empty($leaveDetailId)){
			
			require_once 'connect.inc.php';

			connect_db('logincredentialsdb');
			$queryFind="SELECT * FROM leave_details_tb WHERE leaveDetailId=".$leaveDetailId;
			if( $mysql_run=mysql_query($queryFind)){

				if( mysql_num_rows($mysql_run)==1){

					$query_row = mysql_fetch_assoc($mysql_run);
					$recommending = $query_row['recommendingAuthority'];
					$approving = $query_row['approvingAuthority'];

					if($userId==$recommending )
						$query = "UPDATE leave_details_tb SET leaveStatus='4', rejectedBy='$userId',commentByRecommending='$comment' WHERE leaveDetailId='$leaveDetailId'";

					else if($userId==$approving)
						$query = "UPDATE leave_details_tb SET leaveStatus='4', rejectedBy='$userId',commentByApproving='$comment' WHERE leaveDetailId='$leaveDetailId'";

					if($query_run = mysql_query($query)){
						echo "Application Rejected";
					}else{
						echo "Failed to reject application";
					}

				}
			}
			else
				echo 'Fail to Reject';
			
		}
	}

?>