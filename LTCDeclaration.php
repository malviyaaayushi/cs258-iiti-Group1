<?php
	include 'core/init.php';
	$user = new user();
	$user->compute_LTC_declaration();
	$user->compute_LTC_dependents();


	function display_ltc_dependents($array){
		$string  = '';		$count = 1;
		foreach($array->results() as $item){			
			$string .= '<tr><td>' . $count++ . '</td>' .
					  '<td>' . $item->name . '</td>' .
					  '<td>' . $item->relationship . '</td>' .
					  '<td>' . $item->dob . '</td>' .
					  '<td>' . $item->employmentDetails . '</td>' . 
					  '<td>' . $item->totalIncome . '</td>'.
					  '</tr>';
		
		}
		return $string;
	}

?>
<style>
	#box{
		padding:20px;
		padding-top:30px;
		width:973px;
		min-height:500px;
		top:48px;
		left:250px;
		margin:100px auto;
		background-color: rgba(0,0,0,0.7);
		border-radius:2px;
		color:white;
		line-height: 3;
	}
	#box2{
		padding:20px;
		width:973px;
		min-height:300px;
		top:48px;
		left:250px;
		margin:100px auto;
		background-color: rgba(0,0,0,0.7);
		border-radius:2px;
		color:white;
		line-height: 3;
	}
</style>
<div id = 'box'>
	<p>Declared the following:<br/>
		<table class = 'pure-table' 'pure-table-horizontal' style = "background:white;color:black;border-radius:2px;width:933px;">
			<tr class = 'pure-table-odd'>
				<td width = '200px'>Hometown</td>
				<td width = '300px'><?php echo  $user->get_ltc_declaration()->homeTown ; ?></td></tr>
			<tr>
				<td>Taluka</td>
				<td><?php echo  $user->get_ltc_declaration()->taluka ; ?></td></tr>
			<tr class = 'pure-table-odd'>
				<td>Dist.</td>
				<td><?php echo  $user->get_ltc_declaration()->district ; ?></td></tr>
			<tr>
				<td>State</td>
				<td><?php echo  $user->get_ltc_declaration()->state ; ?></td></tr>
			<tr class = 'pure-table-odd'>
				<td>Nearest Railway station</td>
				<td><?php echo  $user->get_ltc_declaration()->nearestRlyStation; ?></td>
			</tr>
		</table>
	</p>
	<div style = 'padding:10px;width:inherit;'></div>
	<p>Reasons for declaration of <?php echo $user->get_ltc_declaration()->homeTown; ?> 
		as my hometown are as under :
		<ul class = 'pure-menu' 'pure-menu-horizontal' style = "list-style-type:circle;background:white;color:black;border-radius:2px;">
			<li style = "list-style-type:square;"><?php echo  $user->get_ltc_declaration()->reasonOneForDeclaration;?></li>
			<li style = "list-style-type:decimal;"><?php echo  $user->get_ltc_declaration()->reasonTwoForDeclaration;?></li>
		</ul>
	</p>
</div>

<div id = 'box2'>
	<table class = 'pure-table' 'pure-table-horizontal' style = "color:black;background:white;border-radius:2px;text-align:center;width:933px;">
		<tr class = 'pure-table-odd'>
			<td>Sr. No</td>
			<td width="200px"> Name</td>
			<td>Relationship</td>
			<td>DOB</td>
			<td>Employer details</td>
			<td>Income from all Sources</td>
		</tr>
		<?php echo display_ltc_dependents($user->get_ltc_dependents()); ?>
	</table>
	<p>
		I hereby declare that the above-mentioned people are residing with and wholly dependent on me except the following:		
	</p>
</div>












