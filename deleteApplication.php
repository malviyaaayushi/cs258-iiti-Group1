<?php

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {

		$allLeavesCount = $_GET['allLeavesCount'];
		$allLeaves = json_decode($_GET['allLeaves']);

		require_once ('connect.inc.php');
		require_once('functions.php');
 
		connect_db('logincredentialsdb');

		transfer_leaves("leave_details_tb", "deleted_applications_tb", $allLeaves, $allLeavesCount);
	}

?>