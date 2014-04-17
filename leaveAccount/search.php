<?php

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {

		$keyword = $_GET['keyword'];
		$type = $_GET['type'];

		if(!empty($keyword) && !empty($type)){
			
			$userId = 1;//$_SESSION['userId'];

			require_once '../connect.inc.php';
			require_once 'functions.php';

			connect_db('leave_account_db');

			if($type=="inbox"){
				$query = "SELECT * FROM leave_details_tb WHERE userName LIKE '%".$keyword."%' AND recommendingAuthority='$userId' OR approvingAuthority='$userId'";				
			}else if($type=="trashBox"){
				$query = "SELECT * FROM deleted_applications_tb WHERE userName LIKE '%".$keyword."%' AND recommendingAuthority='$userId' OR approvingAuthority='$userId'";				
			}else if($type=="trashBox"){
				$query = "SELECT * FROM leave_details_tb WHERE userName LIKE '%".$keyword."%' AND userId='$userId'";				
			}

			if($type=="inbox" || $type=="trashBox"){
				list_display_query($query, "readyDeleteApplication");
			}else if($type=="trashBox"){
				list_display_query($query, "readyRestoreApplication");
			}			

		}else if(empty($keyword)){

			if(!empty($type)){
				if($type=="inbox"){
					include 'inboxList.php';				
				}else if($type=="trashBox"){
					include 'trashBoxList.php';				
				}else if($type=="outbox"){
					include 'outboxList.php';				
				}
			}else{
				echo "<li>No results found</li>";
			}
		}

	}
?>


