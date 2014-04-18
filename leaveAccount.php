
<?php
	include_once 'connect.inc.php';
	
	connect_db('logincredentialsdb');

	$EOLeave="";
	displayLeaveBalance(); 

	function displayEarnedLeaves(){
		include_once 'core/init.php';
		$user=new user();
		$userId = $user->data()->id;
		$query="SELECT * FROM  leave_details_tb WHERE userId='$userId'";
        	if($query_run = mysql_query($query)){
        		if(mysql_num_rows($query_run)==0){
				echo "<h2>No Leaves taken</h2>";
			}else{
				echo "<table class = 'pure-table' 'pure-table-horizontal' id='historyBox'  style='padding-top:30px;'>".
							"<thead><tr><th>From</th><th>To</th><th>Duration</th><th>Recommended by</th>".
							"<th>Approved By</th><th>Travel Concession Taken</th></tr></thead>";
				while($query_row = mysql_fetch_assoc($query_run)){
					if($query_row['leaveType']=='earnedLeaveBalance' && $query_row['leaveStatus']=='3' ){
						$applicantId = $query_row['userId'];
						if($query_row['availConcession']==1) 
							$Concession='Yes';
						else $Concession='No';
						
				echo "<tr><td>".date('m/d/Y',strtotime($query_row['fromDate']))."</td><td>".date("m/d/Y",(strtotime(date("Y-m-d", strtotime($query_row['fromDate'])) . " +".$query_row['leaveDuration']." days")))."</td><td>".$query_row['leaveDuration']."</td><td>".$query_row['recommendingAuthority']."</td>".
						"<td>".$query_row['approvingAuthority']."</td><td>".$Concession."</td></tr>";
	   							
   					}else{
					//echo "<li style='align:center;'><a>No Leaves Taken</a></li>";
					}
				}
				echo "</table>";
			}
			
		}else
		 echo "Some Error occured";
	}

	function displayLeaveBalance(){
		include_once 'core/init.php';
		$user=new user();
		$userId = $user->data()->id;
		$query_all_leaves="SELECT * FROM  leave_balance_tb WHERE userId='$userId'";
        	if($query_run=mysql_query($query_all_leaves)){
        	if(mysql_num_rows($query_run)==1){
        		$query_row=mysql_fetch_assoc($query_run);
        		$EOLeave=$query_row['extraOrdinaryLeaveBalance'];
        		$String="<tr ><td style='align=center'>".$query_row['casualLeaveBalance']."</td>".
        			   	   "<td>".$query_row['specialClBalance']."</td>".
							"<td>".$query_row['specialLeaveBalance']."</td>".
							"<td>".$query_row['halfPayLeaveBalance']."</td>".
							"<td>".$query_row['earnedLeaveBalance']."</td>".
							"<td>".$query_row['maternityLeaveBalance']."</td>".
							"<td>".$query_row['hospitalLeaveBalance']."</td>".
							"<td>".$query_row['quarantineLeaveBalance']."</td>".
							"<td>".$query_row['leaveNotLeaveBalance']."</td>".
							"<td>".$query_row['sabbaticalLeaveBalance']."</td>".
							"<td>".$query_row['vacationBalance']."</td></tr>";
			}else{
        		
        		$String= 'Error Occured';
        	}

	    }
	    return $String;
	    
	}

	function displaytable($LeaveType){
		include_once 'core/init.php';
		$user=new user();
		$userId = $user->data()->id;
		$query="SELECT * FROM  leave_details_tb WHERE userId='$userId'";
        	if($query_run = mysql_query($query)){
        		if(mysql_num_rows($query_run)==0){
				echo "<h2>No Leaves taken</h2>";
			}else{
				echo "<table class = 'pure-table' 'pure-table-horizontal' id='historyBox' >".
							"<thead><tr><th>From</th><th>To</th><th>Duration</th><th>Recommended by</th>".
							"<th>Approved By</th><th>Based on Medical Certificate</th><th>Travel Concession Taken</th></tr></thead>";
				while($query_row = mysql_fetch_assoc($query_run)){
					if($query_row['leaveType']==$LeaveType && $query_row['leaveStatus']=='3' ){
						$applicantId = $query_row['userId'];
						if($query_row['availConcession']==1) 
							$Concession='Yes';
						else $Concession='No';
						if($query_row['medicalCertificate']==1) 
							$Medcerti='Yes';
						else $Medcerti='No';
						//echo date("Y-m-d",(strtotime(date("Y-m-d", strtotime($query_row['fromDate'])) . " +".$query_row['leaveDuration']." days")));
				 echo "<tr><td>".date('m/d/Y',strtotime($query_row['fromDate']))."</td><td>".date("m/d/Y",(strtotime(date("Y-m-d", strtotime($query_row['fromDate'])) . " +".$query_row['leaveDuration']." days")))."</td><td>".$query_row['leaveDuration']."</td><td>".$query_row['recommendingAuthority']."</td>".
						"<td>".$query_row['approvingAuthority']."</td><td>".$Medcerti."</td><td>".$Concession."</td></tr>";
	   							
   					}else{
					//echo "<li style='align:center;'><a>No Leaves Taken</a></li>";
					}
				}
				echo "</table>";
			}
			
		}else
		 echo "Some Error occured";
	}
?>


<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure-min.css">
	
		<div id="Dispalyalways" style="padding:100px;">
			<div id="demo-horizontal-menu" class="pure-menu pure-menu-open pure-menu-horizontal">
			    <ul id="std-menu-items">
			        <li><a href="#" onclick="displayLeaveBalancejs();">Leave Balance</a></li>
			        <li><a href="#" onclick="displayEarnedLeavesjs();">Earned Leave History</a></li>
			        <li><a href="#" onclick="displayhalfPayLeavesjs();">Half Play Leave History</a></li>
			     </ul>
		 	</div>
		 	

		 	<div >
				<h1>Length of Service</h1>
				<table style='width:50%;align:center;'>
					<tr class='table-li-odd'><td>Joined from -</td><td>2011</td></tr>
					<tr class='table-li-even'><td>To -</td><td>2014</td></tr>
					<tr class='table-li-odd'><td>Number of years completed</td><td>3 years</td></tr>
				</table>
					<div id="leaveHistory" style="display:none;">
						<table id = 'leaveContent' style='width:50%;align:center;' >
							
								<tr class='table-li-even' ><td colspan="2">Particaulars of service in the half-year of a calender year</td><td colspan="2"></td></tr>
								
								<tr class='table-li-odd'>
										<td width="25%">From -</td>
										<td width="25%">1 Jan 2012</td>
										<td width="25%">To -</td>
										<td width="25%">5 Jan 2012</td>
								</tr>
								<tr class='table-li-even'>
									<td colspan="3">Completed months of service in the half year of a calender year</td>
									<td >4 months</td>
								</tr>
								<tr class='table-li-odd'>
									<td colspan="3">Earned Leave credited at the beginning of the half-year</td>
									<td ><br></td>
								<tr>
								<tr class='table-li-even'>
									<td colspan="3">Total No. of days of E.O.L./Dies non</td>
									<td >$EOLeave<br></td>
								<tr>
								<!--<tr class='table-li-odd'>
									<td colspan="3">Total Earned Leave at credit in Days</td>
									<td ><br></td>
								</tr>-->
						</table>
						<h1 style='padding-top:60px'>Earned Leaves</h1>
						 <?php displayEarnedLeaves();?>
					</div>
				
   			</div>
   		</div>
	
     


		<div  id = 'leaveBalanceTable'  style="display:block;padding:100px;padding-top:10px;">
			<h1>Leaves at credit</h1>
			<table class = 'pure-table' 'pure-table-horizontal'>
				<tr class='pure-table-odd'>
					<td >Casual</td>
					<td>Special Casual</td>
					<td>Special</td>
					<td>Half Pay</td>
					<td>Earned</td>
					<td>Maternity</td>
					<td>Hospital</td>
					<td>Quarantine</td>
					<td>Leave not due</td>
					<td>Sabbatical</td>
					<td>Vacation</td>
				</tr>
				<?php  echo displayLeaveBalance(); ?>

			</table>
		</div>


		<div id ="halfpayTable" style="display:none;padding:100px;padding-top:60px;">

		 	<div id="demo-horizontal-menu" class="pure-menu pure-menu-open pure-menu-horizontal">
				<ul id="std-menu-items" >
				        <li><a href="#" onclick="displayLeavejs('halfPayLeaveBalance');">Half Pay leave</a></li>
				        <li><a href="#"  onclick="displayLeavejs('commutedLeaveBalance');">Commuted Leaves</a></li>
				        <li><a href="#"  onclick="displayLeavejs('leaveNotLeaveBalance');">Leave not due</a></li>
			    	</ul>
			</div>

			<div id="halftable" style="display:block;"><h1 style="font-color:black;">Leave Type: Half Pay Leave</h1><?php displaytable('halfPayLeaveBalance')?>	</div>
			<div id="commutedtable" style="display:none;"><h1 style="font-color:black;">Leave Type: Commuted Leave</h1><?php displaytable('commutedLeaveBalance')?></div> 
	      		<div id="leavenotduetable" style="display:none;"><h1 style="font-color:black;">Leave Type: Leave not due</h1><?php displaytable('leaveNotLeaveBalance')?></div>	

		</div>
	
<div class = 'clearFloat'></div>