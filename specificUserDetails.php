<div>

	<table id = 'biodataTable' class = 'pure-table' 'pure-table-horizontal'>
		<tr class = 'pure-table-odd'>
			<td>User Name</td>
			<td>Applying Date</td>
			<td>Leave from</td>
			<td>Leave Duration</td>
			<td>Recommending Authority</td>
			<td>Approving Authority</td>
			<td>Leave Type</td>
			<td>Leave Address</td>
			<td>Comment By Recommending</td>
			<td>Comment By Approving</td>
		</tr>

<?php

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {

		$userId = $_GET['userId'];

		if(!empty($userId)){

			require_once 'connect.inc.php';
			connect_db('logincredentialsdb');

			$query = "SELECT * FROM leave_details_tb WHERE userId='$userId'";

			if($query_run = mysql_query($query)){

				$count = 0;

				while($query_row = mysql_fetch_assoc($query_run)){

					if($count%2==1){
						echo "<tr class = 'pure-table-odd'>";
					}else{
						echo "<tr class = 'pure-table-even'>";
					}

					echo "<a onclick='showUserToAdmin(".$query_row['userId'].");'>";

					echo "<td>".$query_row['userName']."</td>
						<td>".$query_row['applyingDate']."</td>
						<td>".$query_row['fromDate']."</td>
						<td>".$query_row['leaveDuration']."</td>
						<td>".$query_row['recommendingAuthority']."</td>
						<td>".$query_row['approvingAuthority']."</td>
						<td>".$query_row['leaveType']."</td>
						<td>".$query_row['leaveAddress']."</td>
						<td>".$query_row['commentByRecommending']."</td>
						<td>".$query_row['commentByApproving']."</td>
					</a>
					</tr>";

					$count++;
				}


			}else{
				echo mysql_error();
			}

		}

	}


?>

	</table>

</div>