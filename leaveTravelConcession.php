<?php
require_once 'core/init.php';
require("includes/functions.php"); 
// require("includes/header.php");
$user = new user();
?>
<style>
table#data{
	line-height: 3;
	text-align: center;
	color: black;
}
div#content{
	width: 100%;
}
div#profile{
	padding: 50px;
	height: 500px;
	margin: 48px auto;	
	bottom:50px;
}
</style>

<div id = 'content'>
	<div id = 'profile'>
		<h1>LTC Records</h1><br>
		<table id = 'data' class = 'pure-table' 'pure-table-horizontal' style = "background-color:white;">
			<tr class='pure-table-odd' style="line-height:2;">
				<td></td>
				<td  colspan = "2">Leave dates</td>
				<td>Name of person for</td>
				<td>Relation of person for</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr class='pure-table-odd' style="line-height:1;">
				<td>Block Year</td>
				<td>From</td>
				<td>To</td>
				<td>whom availed of</td>
				<td>whom availed of</td>
				<td>Home town</td>
				<td>Other places</td>
				<td>Amount Paid</td>
				<td>Certifying Officer</td>
			</tr>
<?php 

		include 'connect.inc.php';

		connect_db('logincredentialsdb');

		$query = "SELECT * FROM leave_travel_concession_tb WHERE userId='".$user->data()->id."'";

		if($query_run = mysql_query($query)){

			$count = 0;

			if(mysql_num_rows($query_run)==0){
				echo "<tr class='pure-table-even'>No results found</tr>";
			}else{
				while ($query_row = mysql_fetch_assoc($query_run)) {
					
					if($count%2==0){
						echo "<tr class='pure-table-even'>";
					}else{
						echo "<tr class='pure-table-odd'>";
					}
					
					echo "
						<td>".$query_row['blockYear']."</td>
						<td>".$query_row['fromDate']."</td>
						<td>".$query_row['toDate']."</td>
						<td>".$query_row['relativeName']."</td>
						<td>".$query_row['relation']."</td>
						<td>".$query_row['homeTown']."</td>
						<td>".$query_row['otherPlaces']."</td>
						<td>".$query_row['amountPaid']."</td>
						<td>".$query_row['certifyingOfficer']."</td>
					</tr>";

					$count++;
				}				
			}
		}else{
			echo "<tr class='pure-table-even'>Sorry, could not connect to database</tr>";
		}
	

?>

		</table>
	</div>
</div>
<div class = "clearFloat"></div>
