<?php

	if( !isset($_SESSION['userId']) ){

		require_once('connect.inc.php');
		require_once('functions.php');

		connect_db('logincredentialsdb');

		$userId = 1;//$_SESSION['userId'];

		$query = "SELECT * FROM leave_details_tb WHERE userId='$userId' ORDER by applyingDate DESC";

		list_display_query($query, "readyDeleteApplication");

	}

?>
