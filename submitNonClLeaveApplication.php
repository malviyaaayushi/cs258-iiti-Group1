<?php
	include 'core/init.php';
	$user = new user();
	$userId = $user->data()->id;
	include 'connect.inc.php';

	
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
				$recommendingAuthority=$_POST['recommendingAuthority'];
				$approvingAuthority=$_POST['approvingAuthority'];
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
						connect_db('logincredentialsdb');
						if ($leaveType=='extraordinaryLeaveBalance') {
							$numberOfDays=$numberOfDays/10;
							$leaveType='halfPayLeaveBalance';
						}

					        $query_find_leaves = "SELECT $leaveType FROM  leave_balance_tb WHERE userId='$userId'";

					        if($query_run=mysql_query($query_find_leaves)){
						     	if(mysql_num_rows($query_run)==1){
						     		$query_row=mysql_fetch_assoc($query_run);
						     		$numberOfDaysLeft=$query_row[$leaveType];
						     	}else{
						   
						     		echo 'Error Occured';

						        }
					     	}
					     if($numberOfDays>0){
						
							if($numberOfDays<$numberOfDaysLeft ){
								 
								$leaveReason = mysql_real_escape_string($leaveReason);
						
								$query= "INSERT INTO leave_details_tb VALUES (NULL, '".$userId."', '".$user->data()->name."', '1' ,NOW() ,FROM_UNIXTIME($fromDate),'$numberOfDays', '$leaveReason','$recommendingAuthority', '$approvingAuthority', '$leaveType', '$availConcession', '$leaveAddress','','','' ,'0','')";
								
								if($query_run = mysql_query($query)){
									$query_update_balance="UPDATE leave_balance_tb SET $leaveType=$numberOfDaysLeft-$numberOfDays WHERE  userId='$userId'";
									if($query_run=mysql_query($query_update_balance))
										echo "Your application is sent for furthur process";
									else
										echo 'Problem';
									
								}else{
									echo mysql_error();
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