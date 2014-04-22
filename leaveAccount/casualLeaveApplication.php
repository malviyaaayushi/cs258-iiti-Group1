<?php
	
	include '../connect.inc.php';
	
	if( isset($_POST['fromDate']) && isset($_POST['toDate']) && isset($_POST['leaveReason']) && 
		isset($_POST['recommendingAuthority']) && isset($_POST['approvingAuthority']) ){
			
			$fromDate = $_POST['fromDate'];
			$toDate = $_POST['toDate'];
			$leaveReason = $_POST['leaveReason'];
			$recommendingAuthority = $_POST['recommendingAuthority'];
			$approvingAuthority = $_POST['approvingAuthority'];
			$leaveType='clBalance';
			
			if( !empty($fromDate) && !empty($toDate) && !empty($leaveReason) && 
				!empty($recommendingAuthority) && !empty($approvingAuthority) ){
					
					$fromDate=$_POST['fromDate'];
					$toDate=$_POST['toDate'];
				if( strlen($leaveReason) < 500){

					 $now = time();  
				     $fromDate = strtotime($fromDate);
				     $toDate=strtotime($toDate);
				     $datediff = $toDate-$fromDate;
				     echo $numberOfDays =ceil($datediff/(60*60*24)) + 1 ;
				     connect_leave_account_db();
				       $query_find_leaves="SELECT $leaveType FROM  leave_balance_tb WHERE userId='1'";
					     if($query_run=mysql_query($query_find_leaves)){
					     	if(mysql_num_rows($query_run)==1){
					     		$query_row=mysql_fetch_assoc($query_run);
					     		echo $numberOfDaysLeft=$query_row[$leaveType];
					     	}else{
					     		echo 'Error Occured';
					     	}

				     if($numberOfDays>0){
					
						if($numberOfDays<$numberOfDaysLeft ){
							 
							$leaveReason = mysql_real_escape_string($leaveReason);
							$recommendingAuthority = 1;
							$approvingAuthority = 2;
							
				
							$query= "INSERT INTO leave_details_tb VALUES (NULL, '0', '1' ,NOW(),FROM_UNIXTIME($fromDate),'$numberOfDays', '$leaveReason','$recommendingAuthority', '$approvingAuthority', '$leaveType',' ','')";
							
						
							if($query_run = mysql_query($query)){
								
								$query_update_balance="UPDATE leave_balance_tb SET $leaveType=$numberOfDaysLeft-$numberOfDays WHERE  userId='1'";
									if($query_run=mysql_query($query_update_balance))
									echo "Your application is sent for furthur process";
									else
										echo 'some problem occured';
								
							}else{
								"Sorry, an error occured. Please try sometime later.";
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
			
		}
	}
	
?>

	<table>
    		<tr>
    			<td>Duration of leave required:</td>
    			<td>
    				<input name="fromDate" type="date">
    				                to
    				<input name="toDate" type="date">
    			</td>	    				
    		</tr>
		<tr>
			<td>Reason for Casual Leaves and Grounds: </td>
			<td><textarea name="leaveReason" maxlength="500" rows="6" cols="40" placeholder="Do not use more than 100 words"></textarea></td>
		</tr>
		<tr>
			<td>Recommending Authority: </td>
			<td><input name="recommendingAuthority" id="recommendingAuthority" type="text" placeholder="Recommending Authority"></td>
		</tr>
		<tr>
			<td>Sanctioning Authority: </td>
			<td><input name="approvingAuthority" type="text" placeholder=" Sanctioning Authority"></td>
		</tr>

	</table>
