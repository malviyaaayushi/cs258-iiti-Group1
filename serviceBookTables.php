<?php 
	require 'core/init.php';
	if(isset($_GET['id'])) $user = new user(intval($_GET['id']));
	else $user = new user();


	function displayQualifyingServices($array){
		$string  = '';		
		foreach($array->results() as $item){			
			$string .= '<tr><td>' . $item->from . '</td>' .
					  '<td>' . $item->to . '</td>' .
					  '<td>' . $item->postHeld . '</td>' .
					  '<td>' . $item->purpose . '</td></tr>';
		
		}
		return $string;
	}
	$user->biodata();
	$user->certificate();
	$user->qualifying_service();
	
?>

	<table id = 'biodataTable' class = 'pure-table' 'pure-table-horizontal'>
		<tr class = 'pure-table-odd'>
			<td width = "250px">Name</td>
			<td><?php echo $user->get_biodata()->name?></td>
		</tr>
		<tr>
			<td>Father's Name</td>
			<td><?php echo $user->get_biodata()->fatherName?></td>
		</tr>
		<tr class = 'pure-table-odd'>
			<td>Spouse Name</td>
			<td><?php echo $user->get_biodata()->spouseName?></td>
		</tr>
		<tr>
			<td>Nationality</td>
			<td><?php echo $user->get_biodata()->nationality?></td>
		</tr>
		<tr class = 'pure-table-odd'>
			<td>Religion</td>
			<td><?php echo $user->get_biodata()->religion?></td>
		</tr>
		<tr>
			<td>SC/ST(NA if neither)</td>
			<td><?php echo $user->get_biodata()->scheduledCaste?></td>
		</tr>
		<tr class = 'pure-table-odd'>
			<td>Caste</td>
			<td><?php echo $user->get_biodata()->casteName?></td>
		</tr>
		<tr>
			<td>DOB</td>
			<td><?php echo $user->get_biodata()->DOB?></td>
		</tr>
		<tr class = 'pure-table-odd'>
			<td rowspan = 2>Qualification</td>
			<td><?php echo $user->get_biodata()->qualificationWhenAppointed?></td>
		</tr>
		<tr>					
			<td><?php echo $user->get_biodata()->qualificationAfterwards?></td>
		</tr>
		<tr>
			<td>Height</td>
			<td><?php echo $user->get_biodata()->heightCm?></td>
		</tr>
		<tr class = 'pure-table-odd'>
			<td>Identification Marks</td>
			<td><?php echo $user->get_biodata()->identificationMarks?></td>
		</tr>
		<tr>
			<td>Permanent Home Address</td>
			<td><?php echo $user->get_biodata()->permanentHomeAddress?></td>
		</tr>
	</table>

<table id = 'certificateTable' class = 'pure-table' 'pure-table-horizontal'>
	<tr class = 'pure-table-odd'>	
		<td width = 200px>Medical Examination</td>
		<td>Medically Examined On 
		<?php echo $user->get_certificate()->medicalTestDate?> by
		<?php echo $user->get_certificate()->medicalTestBy?>. Medical Certificate is in safe custody vide Sr. No
		<?php echo $user->get_certificate()->medicalFileNo?></td>
	</tr>
	<tr>
		<td>Character and Antecedents</td>
		<td>Characer and Antecedents have been verified and the verification report is kept in safe custody vide Sr.No 
		<?php echo $user->get_certificate()->antecedentsFileNo?></td>
	</tr>
	<tr class = 'pure-table-odd'>
		<td>Verification of Biodata</td>
		<td>Original documents for Biodata have been verified. Attested copies have been filed at Sr.No 
		<?php echo $user->get_certificate()->biodataFileNo?></td>
	</tr>
	<tr >
		<td colspan = 2><b>Requirement Benefit Scheme</b></td>		
	</tr>
	<tr>
		<td>Scheme Elected</td>
		<td><?php echo $user->get_certificate()->RBScheme?></td>
	</tr>
	<tr>
		<td>File No.</td>
		<td><?php echo $user->get_certificate()->RBFileNo?></td>
	</tr>
	<tr>
		<td>Date</td>
		<td><?php echo $user->get_certificate()->RBDate?></td>
	</tr>
	<tr class = 'pure-table-odd'>
		<td>PRAN Number</td><td><?php echo $user->get_certificate()->pranNo?></td>
	</tr>
	<tr class = 'pure-table-odd'>
		<td>Nomination for NPS</td>
		<td>Has filed for nominations for NPS filed at Sr.No <?php echo $user->get_certificate()->npsFileNo?></td>
	</tr>
</table>

<table id = 'qualifyingTable' class = 'pure-table' 'pure-table-horizontal'>
	<tr class = 'pure-table-odd'>
		<td colspan = "2">Period</td>
		<td rowspan = "2" width = "200px">Post held</td>
		<td rowspan = "2" width = "400px">Purpose for which it qualifies</td>
	</tr>		
	<tr class = 'pure-table-odd'>
		<td width = "120px">From</td>
		<td width = "120px">To</td>				
	</tr>			
	<?php echo displayQualifyingServices($user->get_qualifying_services()); ?>
</table>

<table id = 'foreignTable' class = 'pure-table' 'pure-table-horizontal'>
	<tr class = 'pure-table-odd'>
		<td colspan = "2">Period</td>
		<td rowspan = "2" width = "200px">Post held and name of Employer</td>
		<td rowspan = "2" width = "400px">Purpose for which it qualifies</td>
		<td rowspan = "2" width = "400px">Leave and Pension / CPF Contribution payable </td>
		<td rowspan = "2" width = "400px">Leave and Pension / CPF Contribution received</td>
		<td rowspan = "2" width = "400px">M.R. No</td>
		<td rowspan = "2" width = "400px">M.R. Date</td>
	</tr>		
	<tr >
		<td width = "120px">From</td>
		<td width = "120px">To</td>				
	</tr>			
	
</table>