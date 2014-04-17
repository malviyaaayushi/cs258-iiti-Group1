<?php
	include '../connect.inc.php';
	
	if( isset($_POST['fromDate']) && isset($_POST['toDate']) && isset($_POST['availConcession']) && isset($_POST['leaveReason']) && 
		isset($_POST['leaveAddress']) && isset($_POST['recommendingAuthority']) && isset($_POST['approvingAuthority'])){
		if(isset($_POST['agreeToTerms'])){
				$leaveType=$_POST['leaveType'];
				$fromDate=$_POST['fromDate'];
				$toDate=$_POST['toDate'];
				$availConcession=$_POST['availConcession'];
				$reason=$_POST['leaveReason'];
				$leaveReason=$_POST['leaveReason'];
				$leaveAddress=$_POST['leaveAddress'];
				//$recommendingAuthority=$_POST['recommendingAuthority'];
				//$approvingAuthority=$_POST['approvingAuthority'];
				$recommendingAuthority='1';
				$approvingAuthority='2';
				$agreeToTerms=$_POST['agreeToTerms'];
				if(  !empty($fromDate) && !empty($toDate) && !empty($availConcession) && !empty($leaveReason) && !empty($leaveAddress)&& 
					!empty($recommendingAuthority) && !empty($approvingAuthority)  ){
						
						$fromDate=$_POST['fromDate'];
						$toDate=$_POST['toDate'];
					if( strlen($leaveReason) < 500){

						 $now = time();  
					     $fromDate = strtotime($fromDate);
					     $toDate=strtotime($toDate);
					     $datediff = $toDate-$fromDate;
					     $numberOfDays =ceil($datediff/(60*60*24)) + 1;
					     connect_leave_account_db();
					     $query_find_leaves="SELECT $leaveType FROM  leave_balance_tb WHERE userId='1'";
					     if($query_run=mysql_query($query_find_leaves)){
					     	if(mysql_num_rows($query_run)==1){
					     		$query_row=mysql_fetch_assoc($query_run);
					     		echo $numberOfDaysLeft=$query_row[$leaveType];
					     	}else{
					     		echo 'Error Occured';
					     	}

					     }
					     if($numberOfDays>0){
						
							if($numberOfDays<$numberOfDaysLeft ){
								 
								$leaveReason = mysql_real_escape_string($leaveReason);
						
								$query= "INSERT INTO leave_details_tb VALUES (NULL, '1', '1' ,NOW() ,FROM_UNIXTIME($fromDate),'$numberOfDays', '$leaveReason','$recommendingAuthority', '$approvingAuthority', '$leaveType', '$availConcession', '$leaveAddress')";
								

								if($query_run = mysql_query($query)){
									$query_update_balance="UPDATE leave_balance_tb SET $leaveType=$numberOfDaysLeft-$numberOfDays WHERE  userId='1'";
									if($query_run=mysql_query($query_update_balance))
									echo "Your application is sent for furthur process";
									else
										echo 'Problem';
									
								}else{
									echo "Sorry, an error occured. Please try sometime later.";
								}
								
							}else{
								echo "You don't have enough leave balance";					
							}
					    }
					    else
					    	echo "Enter dates again";
						
					}else{
						echo "Please adher to maxlength of the field \'Reason for leave\'";
					}
					
				}else{
					echo "All fields are required";
				}			
			}else
			echo 'Please agree to terms';

		}

?>

	    	<table style="width:90%;align:center;">
	    		<tr>
	    			<td>Nature of Leave:</td>
	    			<td>
	    				<select name="leaveType" class="pure-input-1-1">
						<option value="specialClBalanace" selected>Special CL Balanace  </option>
						<option value="specialLeaveBalance"> Special Leave Balance </option>
						<option value="halfPayLeaveBalance"> Half Pay LeaveBalance </option>
						<option value="commutedLeaveBalance"> Commuted Leave Balance </option>
						<option value="earnedLeaveBalance"> Earned Leave Balance </option>
						<option value="extraordinaryLeaveBalance"> Extraordinary Leave Balance </option>
						<option value="maternityLeaveBalance"> Maternity Leave Balance </option>
						<option value="hospitalLeaveBalance"> Hospital Leave Balance </option>
						<option value="quarantineLeaveBalance ">Quarantine Leave Balance </option>
						<option value="leaveNotLeaveBalance"> Leave Not Leave Balance</option>
						<option value="sabbaticalLeaveBalance">Sabbatical Leave Balance </option>
						<option value="vacationBalance"> Vacation Balance</option>
						
					</select>
	    			</td>
	    		</tr>
	    		<tr>
	    			<td>Duration of leave required:</td>
	    			<td>
	    				<input name="fromDate" type="date">
	    				to
	    				<input name="toDate" type="date">
	    			</td>	    				
	    		</tr>
	    		<tr>
	    			<td>Grounds for leave:</td>
	    			<td>   
	    				<textarea name="leaveReason" maxlength="500" rows="4" cols="40" placeholder="Do not use more than 100 words"></textarea>
	        		</td>
	    		</tr>
	    		<tr>
	    			<td>Do you want travel leave concession during the ensuring leave:</td>
	    			<td>
	    				<input type="radio" name="availConcession" value="1" checked> &nbsp;yes</input>&nbsp;&nbsp;	    				
					<input type="radio" name="availConcession" value="0" >&nbsp;no</input>
				</td>
	    		</tr>
	    		<tr>
	    			<td>Address while on leave:</td>
	    			<td>
	    				<textarea name="leaveAddress" maxlength="500" rows="3" cols="40" placeholder="Do not use more than 100 words"></textarea>
	        		</td>
	    		</tr>
	    		<tr>
	    			<td>Recommending Authority:</td>
	    			<td>
	    				<input name="recommendingAuthority" id="recommendingAuthority" type="text" placeholder="Recommending Authority">
	        		</td>
	    		</tr>
	    		<tr>
	    			<td>Sanctioning Authority:</td>
	    			<td>
	    				<input name="approvingAuthority" type="text" placeholder=" Sanctioning Authority">
	    			</td>
	    		</tr>
	    	</table>

	    	<p style="margin-left:10%;">
	    		A. In the event of my resignation or voluntary retirement from the service. I undertake to refund:<br>
		        &nbsp;&nbsp;&nbsp;&nbsp;   1. The difference between the leave salary drawn during commuted leave and that admissible during half pay leave.<br>
		        <br>B.  Undertake to refund the leave salary drawn for the period of earned leave which would not have been admissible, had leave not been credited in advance in the event of my resignation, Voluntary retirement, dismissal or removal from service or removal from service or in the event of termination of my services.
			 
	    	</p>
	    	<p style="margin-left:10%;">
	    		<input name="agreeToTerms" type="checkbox">I agree
	    	</p>
	    	

		

