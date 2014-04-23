<?php 
	include 'core/init.php';
	$user = new user();	
	if(input::exists()){
		$newPassword = input::get('newPassword');
		$confirmPassword = input::get('confirmPassword');
		$oldPassword = input::get('oldPassword');

		if($newPassword === $confirmPassword){
			if($user->verify($user->find('username',$user->data()->username), $oldPassword)){
				$user->changePassword($newPassword);
				redirect::to('applicationsBox.php');
			}else{
				echo "Whoopsie! Looks like you typed the wrong password!";
			}
		}else{
			echo "*Heya mateys! The passwords didn't match :(";
		}

	}
?>
<style>
	#changePassword{
		margin-top:100px;
		margin-left:100px;
		width:500px;
		height: 500px;
	}
</style>

<form id = "changePassword" action = "settings.php" method = "POST" class="pure-form pure-form-aligned">
<h3>CHANGE PASSWORD</h3>
	<div class = "pure-control-group">
		<label>Current Password:</label>
		<input type = "password" id = 'oldPassword' name = 'oldPassword'>
	</div>
	<div class = "pure-control-group">
		<label>New Password:</label>
		<input type = "password" id = 'newPassword' name = 'newPassword'>
	</div>
	<div class = "pure-control-group">
		<label>Confirm Password:</label>
		<input type = "password" id = 'confirmPassword' name = 'confirmPassword'>
	</div>
	<input type = 'submit' value = 'Change' class = "pure-button">
</form>

