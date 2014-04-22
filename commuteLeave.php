<?php
	include 'core/init.php';
		$user = new user();
		$userId=user->data()->id;
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$leaveDetailId = $_GET['leaveDetailId'];
		$duration= $_GET['duration'];
		$leaveStatus=$_GET['leavestatus'];
		$leaveType='halfPayLeaveBalance';
	

		if(!empty($leaveDetailId)){
			require_once 'connect.inc.php';
		
			connect_db('logincredentialsdb');
			$queryfind="SELECT  * from leave_balance_tb WHERE userId= '$userId'";
			if($query_run=mysql_query($queryfind)){
				$query_row=mysql_fetch_assoc($query_run);
				$leaveBalance=$query_row[$leaveType];
				$leaveBalance=$leaveBalance-$duration;
				$queryUpdateBalance = "UPDATE leave_balance_tb SET $leaveType = '$leaveBalance' WHERE userId= '$userId';";
				$queryUpdateType="UPDATE leave_details_tb SET $commuted = '1' WHERE userId= '$userId';"
				if($query_run = mysql_query($queryUpdateBalance) && $query_run = mysql_query($queryUpdateType)){
					echo "Half Pay leave is successfully commuted";
				}else{
					echo "Failed to commute";
				}

			}
			else
				echo "Problem while commuting leave. Contact Administartion Deperment.";

			
		}
		else
			echo 'some problem occured';
	}
	
?>