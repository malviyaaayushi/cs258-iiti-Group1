
<div>
	<!--input type='text' id ='adminSearchBox' class='pure-form input-rounded' placeholder='Search people...' style='width:40%;margin-right:10px;float:right;' onkeyUp='searchAdminPanel(this.value)'-->
</div>

<div id='userLeaveRecords'>

</div> 

<div>

	<table id = 'biodataTable' class = 'pure-table' 'pure-table-horizontal'>
		<tr class = 'pure-table-odd'>
			<td>User ID</td>
			<td>Employ ID</td>
			<td>Name</td>
			<td>Designation</td>
			<td>Department</td>
		</tr>

<?php

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {

		require_once 'connect.inc.php';
		connect_db('logincredentialsdb');

		$query = "SELECT * FROM profile_information_tb";

		if($query_run = mysql_query($query)){

			$count = 0;

			while($query_row = mysql_fetch_assoc($query_run)){

				if($count%2==1){
					echo "<tr class = 'pure-table-odd'>";
				}else{
					echo "<tr class = 'pure-table-even'>";
				}

				echo "<td><a href='#' onclick='showUserToAdmin(\"".$query_row['userID']."\");'>".$query_row['userID']."</a></td>
					<td>".$query_row['empID']."</td>
					<td>".$query_row['Name']."</td>
					<td>".$query_row['designation']."</td>
					<td>".$query_row['department']."</td>
				</tr>";

				$count++;

			}


		}


	}

?>

	</table>
</div>
