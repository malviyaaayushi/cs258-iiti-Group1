<?php
	include_once  'core/init.php';

	function list_display_query($query, $onChangeFunction){
		
		$user = new user();	
		$userId = $user->data()->id;

		if($query_run = mysql_query($query)){

			if(mysql_num_rows($query_run)==0){
				echo "<li style='align:center;'><a>No applications found</a></li>";
			}

			while($query_row = mysql_fetch_assoc($query_run)){

				$applicantId = $query_row['userId'];
				echo "<div class='line-separator'></div>";

				echo "<li><div style='float:left;width:30px;'><input type='checkbox' style='margin-left:10px;' onchange='".$onChangeFunction."(".$query_row['leaveDetailId'].", this.checked);'></div>";
				
				if($onChangeFunction=="readyDeleteApplication"){
					echo "<a href='#' onclick='showApplication(".$query_row['leaveDetailId'].", \"leave_details_tb\");'>";						
				}else if($onChangeFunction=="readyRestoreApplication"){
					echo "<a href='#' onclick='showApplication(".$query_row['leaveDetailId'].", \"deleted_applications_tb\");'>";						
				}	

				if(($query_row['recommendingAuthority']==$userId && $query_row['leaveStatus']=='1')||($query_row['approvingAuthority']==$userId && $query_row['leaveStatus']=='2')){
        				echo "<font color='white' >".$query_row['userName'].": "; 
				}
		        	else {
		        		echo "<font color='#888888 '>".$query_row['userName'].": "; 
		        	}


                		if($query_row['recommendingAuthority']==$userId){
					echo 'Recommend ';
				}else if($query_row['approvingAuthority']==$userId){
					echo 'Approve ';
				}

				echo $query_row['leaveDuration']." days ";
				if($query_row['leaveType']=='casualLeaveBalance'){
					echo "Casual Leave";
				}else if($query_row['leaveType']=='specialClBalance'){
					echo "Special CL";
				}else if($query_row['leaveType']=='specialLeaveBalance'){
					echo "Special Leave";
				}else if($query_row['leaveType']=='halfPayLeaveBalance'){
					echo "Half-Pay Leave";
				}else if($query_row['leaveType']=='commutedLeaveBalance'){
					echo "Commuted Leave";
				}else if($query_row['leaveType']=='earnedLeaveBalance'){
					echo "Earned Leave";
				}else if($query_row['leaveType']=='extraOrdinaryLeaveBalance'){
					echo "Extra Ordinary Leave";
				}else if($query_row['leaveType']=='maternityLeaveBalance'){
					echo "Maternity Leave";
				}else if($query_row['leaveType']=='hospitalLeaveBalance'){
					echo "Hospital Leave";
				}else if($query_row['leaveType']=='quarantineLeaveBalance'){
					echo "Quarantine Leave";
				}else if($query_row['leaveType']=='leaveNotLeaveBalance'){
					echo "Leave Not Leave";
				}else if($query_row['leaveType']=='sabbaticalLeaveBalance'){
					echo "Sabbatical Leave";
				}else if($query_row['leaveType']=='vacationBalance'){
					echo "Vacation Leave";
				}
				echo "<div style='float:right;width:15%;'>".date("d/m/Y", strtotime($query_row['applyingDate']))."</div></font></a></li>";
				echo "<div class='line-separator'></div>";
			}

		}else{

			echo mysql_error();

		}
	}

	function transfer_leaves($from, $to, $allLeaves, $allLeavesCount){

		$query_vars = "";
		$now=time();
		for ($i=0; $i < $allLeavesCount; $i++) { 
			
			$leaveDetailId = $allLeaves[$i];
			if(!empty($leaveDetailId)){
				$query="SELECT * FROM leave_details_tb WHERE leaveDetailId='$leaveDetailId'";
				if($query_run=mysql_query($query)){
					$query_row=mysql_fetch_assoc($query_run);
					if(strtotime($query_row['fromDate']) > $now){
						if($query_vars!=""){
							$query_vars = $query_vars." OR";
						}

						$query_vars = $query_vars." leaveDetailId='".$leaveDetailId."'";
						
					}else{
						echo 'The starting date of leave(s) has been passed. ';
					}
					
				}
				
			}			

		}

		if(!empty($query_vars)){

			$query = "INSERT ".$to." SELECT * FROM ".$from." WHERE".$query_vars;

			if($query_run = mysql_query($query)){

				$query = "DELETE FROM ".$from." WHERE".$query_vars;

				if($query_run = mysql_query($query)){

					if($from=="leave_details_tb"){					
						echo "Application(s) deleted";	
					}else if($from=="deleted_applications_tb"){				
						echo "Application(s) restored";						
					}

				}else{
					if($from=="leave_details_tb"){	
						echo "Failed to delete application(s)";	
					}else if($from=="deleted_applications_tb"){	
						echo "Failed to restore application(s)";						
					}
				}
			}else{
				echo mysql_error();
				if($from=="leave_details_tb"){	
					echo "Failed to delete application(s)";	
				}else if($from=="deleted_applications_tb"){	
					echo "Failed to restore application(s)";						
				}
			}

		}else{
			if(empty($allLeaves)){

				if($from=="leave_details_tb"){	
					echo "No application(s) selected for deletion";	
				}else if($from=="deleted_applications_tb"){	
					echo "No application(s) selected for restoration";						
				}
			}else{
				echo "You can't cancel selected leave(s). Contact Administration Department";
			}
				
		}
	}

?>