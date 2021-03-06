<?php
	include 'connect.inc.php';
	
	connect_db('logincredentialsdb');

	 $EOLeave="";
	displayLeaveBalance(); 


	function displayEarnedLeaves(){
		$query="SELECT * FROM  leave_details_tb WHERE userId='1'";
        	if($query_run = mysql_query($query)){
        		if(mysql_num_rows($query_run)==0){
				echo "<h2>No Leaves taken</h2>";
			}else{
				echo "<br><table class = 'pure-table' 'pure-table-horizontal' id='historyBox'  style='padding-top:30px;padding-left:5%'>".
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
		$query_all_leaves="SELECT * FROM  leave_balance_tb WHERE userId='1'";
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
		$query="SELECT * FROM  leave_details_tb WHERE userId='1'";
        if($query_run = mysql_query($query)){
        		if(mysql_num_rows($query_run)==0){
				echo "<h2>No Leaves taken</h2>";
			}else{
				echo "<br><table class = 'pure-table' 'pure-table-horizontal' id='historyBox' style='padding-top:20px;padding-left:5%;' >".
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



	<link rel="stylesheet" href="css/layouts/tab.css">

	
		<div id="Dispalyalways" style="padding:100px;">
			<div id="demo-horizontal-menu" class="pure-menu pure-menu-open pure-menu-horizontal">
			    <ul id="std-menu-items">
			        <li><a href="#" onclick="displayLeaveBalancejs();">Leave Balance</a></li>
			        <li><a href="#" onclick="displayEarnedLeavesjs();">Earned Leave History</a></li>
			        <li><a href="#" onclick="displayhalfPayLeavesjs();">Half Play Leave History</a></li>
			     </ul>
		 	</div><br>

<?php
	$from="y";
	$time=time();
	$year= date('Y',$time);
	$date= date('M',$time);
	if($date=='Jan' || $date=='Feb'|| $date=='Mar'|| $date=='Apr'|| $date=='May'|| $date=='Jun'){
	$from='01/Jan/'.$year;
	$to='30/June/'.$year;
	}else
	if($date=='Jul'||$date=='Jun'||$date=='Aug'||$date=='Sep'||$date=='Oct'||$date=='Nov'||$date=='Dec'){
	$from='01/July/'.$year;
	$to='31/Dec/'.$year;
	}
?>
		 	<div >
				<h1>Length of Service</h1>
				<table style='width:50%;align:center;'>
					<tr class='table-li-odd'><td>Joined from -</td><td></td></tr>
					<tr class='table-li-even'><td>To -</td><td><?php $time=time(); echo date('d/M/Y',$time); ?></td></tr>
					<tr class='table-li-odd'><td>Number of years completed</td><td>5 years</td></tr>
				</table>
					<div id="leaveHistory" style="display:none;">
						 <table id = 'leaveContent' style='width:50%;align:center;' >
							
								<tr class='table-li-even' ><td colspan="2">Particaulars of service in the half-year of a calender year</td><td colspan="2"></td></tr>
								
								<tr class='table-li-odd'>
										<td width="25%">From -</td>
										<td width="25%"><?= $from; ?></td>
										<td width="25%">To -</td>
										<td width="25%"><?= $to; ?></td>
								</tr>
						</table>
						<h1 style='padding-top:60px'>Earned Leaves</h1>
						 <?php displayEarnedLeaves();?>
					</div>
				
   			</div>
   		</div>
	
     


		<div  id = 'leaveBalanceTable'  style="display:none;padding-top:10px;padding-left:5%;">
			<h1>Leaves at credit</h1><br>
			<table class = 'pure-table' 'pure-table-horizontal'>
				<tr class='pure-table-odd'>
					<td >Casual Leave</td>
					<td>Special Casual Leave</td>
					<td>Special Leave</td>
					<td>Half Pay Leave</td>
					<td>Earned Leave</td>
					<td>Maternity Leave</td>
					<td>Hospital Leave</td>
					<td>Quarantine Leave</td>
					<td>Leave not due</td>
					<td>Sabbatical Leave</td>
					<td>Vacation</td>
				</tr>
				<?php  echo displayLeaveBalance(); ?>

			</table>
		</div>


		<div id ="halfpayTable" style="display:none;padding-top:60px;padding-left:5%;">

		 	<div id="demo-horizontal-menu" class="pure-menu pure-menu-open pure-menu-horizontal">
				    <ul id="std-menu-items" >
		                <li><a href="#" onclick="displayLeavejs('halfPayLeaveBalance');">Half Pay leave</a></li>
		                <li><a href="#"  onclick="displayLeavejs('commutedLeaveBalance');">Commuted Leaves</a></li>
		                <li><a href="#"  onclick="displayLeavejs('leaveNotLeaveBalance');">Leave not due</a></li>
		            </ul>
		    </div>

		    <div id="halftable" style="display:none;padding-top:40px;"><h1 style="font-color:black;">Leave Type: Half Pay Leave</h1><?php displaytable('halfPayLeaveBalance')?>	</div>
		    <div id="commutedtable" style="display:none;padding-top:40px;"><h1 style="font-color:black;">Leave Type: Commuted Leave</h1><?php displaytable('commutedLeaveBalance')?></div> 
      		<div id="leavenotduetable" style="display:none;padding-top:40px;"><h1 style="font-color:black;">Leave Type: Leave not due</h1><?php displaytable('leaveNotLeaveBalance')?></div>	

		</div>
	


	
<div class = 'clearFloat'></div>
