<?php

	if( !isset($_SESSION['userId']) ){

		require_once('connect.inc.php');
		require_once('functions.php');

		connect_db('logincredentialsdb');

		include_once  'core/init.php';
		$user = new user();	

		$userId = $user->data()->id;

		$query = "SELECT * FROM deleted_applications_tb WHERE userId='$userId' ORDER by applyingDate DESC";

		list_display_query($query, "readyRestoreApplication");

	}

?>
