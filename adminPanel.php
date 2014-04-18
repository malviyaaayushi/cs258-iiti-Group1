<?php

	

?>

<style type="text/css">
	#content{
		width:100%;
		height: 100%;
	}
	#wrapper{
		width:100%;
		height:100%;
		margin:0 auto;
	}
	table#biodataTable{
		line-height: 1;
		width: 1000px;
		margin-left: 10px;	
		float:left;
		margin-top: 98px;
		background-color: white;
	}	
	#menu-admin{
		z-index: 0;
		width: 300px;
		position: fixed;
		float:left;
		height: 100%;
		margin-top: 48px;
		color: white;
		padding: 10px;
		background-color: rgba(0,0,0,0.7);
	}	
	#mainContent{
		z-index: 0;
		width: 300px;
		float:left;
		height: 100%;
		margin-left: 300px;
		margin-top: 48px;
		padding: 10px;
	}	
	.width{
		width:280px;
		z-index: 0;
	}
</style>
<div id = 'content'>
	<div id = 'wrapper'>
		<div id = 'menu-admin'>
				<button class='pure-button pure-button-primary width' id = 'registerButton' onclick = "navigate_main_content('register.php');">Register</button>
				<button class='pure-button pure-button-primary width' id = 'allUsersButton' onclick = "navigate_main_content('allUsersDetails.php');">All Users</button>
				<button class='pure-button pure-button-primary width' id = 'updateUserDetailsButton' onclick = "navigate_main_content('updateUserDetails.php');">Update User Details</button>
		</div>		

		<div class='mainContent' id='mainContent'>

			<?php include 'register.php'; ?>

		</div>

	</div>
</div>
<div class = 'clearFloat'></div>




