<?php
require_once 'core/init.php';
$user = new user();
    $loggedIn = false;
    if($user->is_logged_in()){
        $loggedIn = true;   
    }else{
        redirect::to('login.php');
    }
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

	function displayForeignServices($array){
		$string  = '';		
		foreach($array->results() as $item){			
			$string .= '<tr><td>' . $item->fromPeriod . '</td>' .
					  '<td>' . $item->toPeriod . '</td>' .
					  '<td>' . $item->foreignEmployerDetails . '</td>' .
					  '<td>' . $item->LPCPFreceived . '</td>' .
					  '<td>' . $item->LPCPFreceived . '</td>' .
					  '<td>' . $item->MRNo . '</td>' .
					  '<td>' . $item->MRDate . '</td>' .
					  '<td>' . $item->LPCPFpayable . '</td></tr>';
		}
		return $string;	
	}		

	$user->biodata();
	$user->certificate();

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
	table#biodataTable, #certificateTable, #qualifyingTable, #foreignTable{
		position: relative;
		line-height: 3;
		width: 800px;
		margin-left:150px;	
		float:left;
		margin-top: 98px;
		background-color: white;
	}	
	#certificateTable, #qualifyingTable, #foreignTable{
		display: none;
	}
	#foreignTable{
		width:1100px;
	}

	#menu{
		z-index: 0;
		position:relative;
		width: 300px;
		float:left;
		margin-top:100px;
		margin-right: 30px;
		color: white;
		height: 250px;
		padding: 10px;
		background-color: rgba(0,0,0,0.7);
		border-radius: 5px;
	}		
	.width{
		width:280px;
		z-index: 0;
	}
	#anotherUserResults{
		position: absolute;
		background-color: white;
		text-align: left;
		border:1px solid black;
	}
</style>

<div id = 'content'>
	<div id = 'wrapper'>
		<div id = 'menu'>
				<button class='pure-button pure-button-primary width' id = 'biodata' onclick = "biodataClick();">Part I - Biodata</button>
				<button class='pure-button pure-button-primary width' id = 'certificate' onclick = "certificateClick();">Part II - Certificate and Attestation</button>
				<button class='pure-button pure-button-primary width' id = 'services' onclick = "qualifyingClick();">Part III - Qualifying Services</button>
				<?php 
					if($user->data()->actorrank == 1 || $user->data()->actorrank == 2)
					echo "<div id = 'anotherUser' style = 'margin-top:10px;padding-left:37px;'>
							<label style = 'color:white;text-align:center;'>Fetch details of another user</label>
							<input type = 'text' id = 'anotherUserId' autocomplete = 'off' />
							<input type = 'submit' class = 'pure-button' id = 'submitQuery' value = 'Go' onclick='populateTables();'' style = 'border-radius:100%;padding:10px;'>
							<div id = 'anotherUserResults'></div>
						</div>";
				?>
		</div>		
		<div id = 'tables'>
		<?php echo $user->find('username', 'Sriram Ravindran');?>
		<table id = 'biodataTable' class = 'pure-table' 'pure-table-horizontal'>
				<tr class = 'pure-table-odd'>
				
					<td width = "250px">Name</td>
					<td><?php echo $user->get_biodata()->name;?></td>
				</tr>
				<tr>
					<td>Father's Name</td>
					<td><?php echo $user->get_biodata()->fatherName;;?></td>
				</tr>
				<tr class = 'pure-table-odd'>
					<td>Spouse Name</td>
					<td><?php echo $user->get_biodata()->spouseName;?></td>
				</tr>
				<tr>
					<td>Nationality</td>
					<td><?php echo $user->get_biodata()->nationality;?></td>
				</tr>
				<tr class = 'pure-table-odd'>
					<td>Religion</td>
					<td><?php echo $user->get_biodata()->religion;?></td>
				</tr>
				<tr>
					<td>SC/ST(NA if neither)</td>
					<td><?php echo $user->get_biodata()->scheduledCaste;?></td>
				</tr>
				<tr class = 'pure-table-odd'>
					<td>Caste</td>
					<td><?php echo $user->get_biodata()->casteName;?></td>
				</tr>
				<tr>
					<td>DOB</td>
					<td><?php echo $user->get_biodata()->DOB;?></td>
				</tr>
				<tr class = 'pure-table-odd'>
					<td rowspan = 2>Qualification</td>
					<td><?php echo $user->get_biodata()->qualificationWhenAppointed;?></td>
				</tr>
				<tr>					
					<td><?php echo $user->get_biodata()->qualificationAfterwards;?></td>
				</tr>
				<tr>
					<td>Height</td>
					<td><?php echo $user->get_biodata()->heightCm;?></td>
				</tr>
				<tr class = 'pure-table-odd'>
					<td>Identification Marks</td>
					<td><?php echo $user->get_biodata()->identificationMarks;?></td>
				</tr>
				<tr>
					<td>Permanent Home Address</td>
					<td><?php echo $user->get_biodata()->permanentHomeAddress;?></td>
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
			<?php 
				$user->qualifying_service();
				echo displayQualifyingServices($user->get_qualifying_services()); 
			?>
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
			<tr class = 'pure-table-odd'>
				<td width = "120px">From</td>
				<td width = "120px">To</td>				
			</tr>			
			<?php
				$user->foreign_services_compute();
			 	echo displayForeignServices($user->get_foreign_services()); 
			 ?>
		</table>

		</div>
	</div>
</div>
<div class = 'clearFloat'></div>




















































