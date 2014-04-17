<?php


	if ($_SERVER['REQUEST_METHOD'] == 'GET') {

		$userId = $_GET['userId'];
		$leaveType = $_GET['leaveType'];
		$newValue = $_GET['newValue'];

		if(!empty($userId) && !empty($leaveType) && !empty($newValue)){

			require_once 'connect.inc.php';

			connect_db('logincredentialsdb');

			$query = "UPDATE `leave_balance_tb` SET `".$leaveType."`= {$newValue} WHERE `userId`= {$userId}";

			echo $query;

			if($query_run = mysql_query($query)){

				echo "Changes made successfully";

			}else{
				echo mysql_error();
				echo "Could not make changes";

			}

		}
		
	}

?>