<?php
	include  'core/init.php';
	$user = new user();
	require("includes/functions.php"); 
	$user->compute_service_register();

?>
<style>
	#wrapper{
		width:1090px;
		padding:50px;	
		margin:0 auto;
		background: rgba(0,0,0,0.7);
		border-radius:2px;
		margin-top:100px;
		color:black;		
	}
	#part2{
		margin:0 auto;
		margin-top: 30px;
	}
</style>
<div id = 'wrapper'>
	<table id = 'part1' class = 'pure-table' 'pure-table-horizontal' style = "background-color:white;text-align:center;">
		<tr class = 'pure-table-odd'>
			<td rowspan = '2' width = "150px"> Description of Post and Pay </td>
			<td rowspan = '2' width = "150px"> Whether post is permanent or temporary</td>
			<td rowspan = '2' width = "150px"> Whether the incumbent is posted permanently or to officiate</td>
			<td colspan = '4' width = "150px"> If posted to officiate state</td>
		</tr>
		<tr class = 'pure-table-odd'> 	
			<td width = "75px"> Post held permanently </td>
			<td width = "75px"	> Pay in the permanent post </td>
			<td width = "75px"	> Officiating Pay</td>
			<td width = "75px"	> Other emoluments falling under the term 'Pay'</td>
		</tr>
		<?php "<p> Hello</p>"; display_part1($user->get_service_register());?> 
	</table>

	<table id = 'part2' class = 'pure-table' 'pure-table-horizontal' style = "margin-top:100px;background-color:white;text-align:center;">
		<tr class = 'pure-table-odd'>	
			<td colspan = '2' width = "150px"> Period </td>
			<td rowspan = '2' width = "150px"> Events affecting columns 1 to 8 </td>
			<td rowspan = '2' width = "150px"> Nature and duration of leave taken </td>
			<td rowspan = '2' width = "150px"> Reference to any recorded punishment, censure, reward, etc. </td>
			<td rowspan = '2' width = "150px"> Remarks </td>
		</tr>
		<tr class = 'pure-table-odd'>
			<td width = "75px"	> From</td>
			<td width = "75px"	> To </td>
		</tr>
		<?php echo display_part2($user->get_service_register());?> 
	</table>
</div>