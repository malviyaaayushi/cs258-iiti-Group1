<?php
require_once 'core/init.php';
require("includes/functions.php"); 
// require("includes/header.php");
$user = new user();
$user->profile();
?>
<style>
table#data{
	line-height: 3;
	width: 800px;
	float:left;
	color: black;
}
img#profilePic{	
	margin-bottom:50px;
}
div#profile{
	padding: 50px;
	width:1100px;	
	height: 500px;
	margin: 48px auto;	
	bottom:50px;
}
</style>
<div id = 'content'>
	<div id = 'profile'>
		<img id= 'profilePic' src="images/profile/<?php echo $user->data()->id.'.png'?>" width = "200px">
		<table id = 'data' class = 'pure-table' 'pure-table-horizontal' style = "background-color:white;">
			<tr class = 'pure-table-odd'>
				<td width = "200px"> Name: </td>
				<td> <?php echo $user->profile_data()->Name?> </td>
			</tr>
			<tr>
				<td width = "200px"> Age: </td>
				<td> <?php echo $user->profile_data()->Age?> </td>
			</tr>
			<tr class = 'pure-table-odd'>
				<td width = "200px"> Sex: </td>
				<td> <?php echo $user->profile_data()->Sex?> </td>
			</tr>
			<tr>
				<td width = "200px"> DOB: </td>
				<td> <?php echo $user->profile_data()->DOB?> </td>
			</tr>
			<tr class = 'pure-table-odd'>
				<td width = "200px"> Employee ID: </td>
				<td> <?php echo $user->profile_data()->empID?> </td>
			</tr>
			<tr>
				<td width = "200px"> Designation: </td>
				<td> <?php echo $user->profile_data()->designation?> </td>
			</tr>
			<tr class = 'pure-table-odd'>
				<td width = "200px"> Department: </td>
				<td> <?php echo $user->profile_data()->department?> </td>
			</tr>
		</table>
	</div>
</div>
<div class = "clearFloat"></div>
