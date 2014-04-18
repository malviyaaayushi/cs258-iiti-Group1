<?php
	include  'core/init.php';
	$user = new user();
	require("includes/functions.php"); 
	$user->compute_service_register();

?>
<style>
	#wrapper{
		width:1000px;	
		margin:0 auto;		
		margin-top:100px;
		color:black;	
		overflow:hidden;
	}
	#part1{
		width:1800px;
		margin:0 auto;
		transition:0.3s all;
	}
	#expand{
		float:right;
		position:fixed;
		bottom:0px;
		width:200px;
	}
</style>

<div id = 'wrapper'>
<button id = "expand"  class = 'pure-button' 'pure-button-horizontal' onclick = "showTable();"> Expand >> </button>
	<table id = 'part1' class = 'pure-table' 'pure-table-horizontal' style = "background-color:white;text-align:center;">
		<tr class = 'pure-table-odd'>
			<td rowspan = '2' width = "150px"> Description of Post and Pay </td>
			<td rowspan = '2' width = "150px"> Whether post is permanent or temporary</td>
			<td rowspan = '2' width = "150px"> Whether the incumbent is posted permanently or to officiate</td>
			<td colspan = '4' width = "150px"> If posted to officiate state</td>
			<td colspan = '2' width = "150px"> Period </td>
			<td rowspan = '2' width = "150px"> Events affecting columns 1 to 8 </td>
			<td rowspan = '2' width = "150px"> Nature and duration of leave taken </td>
			<td rowspan = '2' width = "150px"> Reference to any recorded punishment, censure, reward, etc. </td>
			<td rowspan = '2' width = "150px"> Remarks </td>
		</tr>
		<tr class = 'pure-table-odd'> 	
			<td width = "75px"> Post held permanently </td>
			<td width = "75px"	> Pay in the permanent post </td>
			<td width = "75px"	> Officiating Pay</td>
			<td width = "75px"	> Other emoluments falling under the term 'Pay'</td>
			<td width = "75px"	> From</td>
			<td width = "75px"	> To </td>
		</tr>
		<?php echo display_part1($user->get_service_register());?> 
		
	</table>
</div>