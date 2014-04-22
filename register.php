<?php
	include  'core/init.php';
	$user = new user();	
	if(token::check(input::get('token'))){
		if(input::exists()){
			{	
				// $validate = new validate();
				// $validation = $validate->check($_POST, array(
				// 	'username' => array(
				// 					'required' => true,
				// 					'min' => 2,
				// 					'max' =>30,
				// 					'unique' => 'login_credentials_tb'),
				// 	'password' => array(
				// 					'required' => true,
				// 					'min' => 2),
				// 	'password_again' => array(
				// 					'required' => true,
				// 					'matches' => 'password'),
				// 	'name' => array(
				// 				'required' => true,
				// 				'min' => 2,
				// 				'max' => 50,
				// 				),

				// 	));

				// if($validation->get_passed()){
			}
				$newUser = new user();
				$salt = hash::salt(32);
				
				try{
					$newUser->create(
								array(
								'name' => input::get('name'),
								'username' => input::get('username'),
								'password' => hash::make(input::get('password'), $salt),
								'type' => input::get('type'),
								'actorrank' => input::get('actorrank'),
								'salt' => $salt),
								array(
								'designation' => input::get('designation'),
								'department' => input::get('department'),
								'userID' => input::get('username'),
								'empID' => input::get('username'),
								'Name' => input::get('name'),
								'Age' => input::get('Age'),
								'Sex' => input::get('Sex'),
								'DOB' => input::get('DOB')
								),
								array(
								'userID' => input::get('username'),
								'name' => input::get('name'),
								'fatherName' => input::get('fathersname'),
								'spouseName' => input::get('spousename'),
								'nationality' => input::get('nationality'),
								'religion' => input::get('religion'),
								'scheduledCaste' => input::get('scst'),
								'casteName' => input::get('casteName'),
								'DOB' => input::get('DOB'),
								'qualificationWhenAppointed' => input::get('appointed'),
								'qualificationAfterwards' => input::get('subsequent'),
								'heightCm' => input::get('height'),
								'identificationMarks' => input::get('identification'),
								'permanentHomeAddress' => input::get('address')),
								array(
								'userID' => input::get('username'),
								'medicalTestBy' => input::get('medicalTestBy'),
								'medicalTestDate' => input::get('medicalTestDate'),
								'medicalFileNo' => input::get('medicalTestSrNo'),
								'antecedentsFileNo' => input::get('characterSrNo'),
								'biodataFileNo' => input::get('biodataVerificationSrNo'),
								'RBScheme' => input::get('schemeElected'),
								'RBFileNo' => input::get('schemeFileNo'),
								'RBDate' => input::get('schemeDate'),
								'pranNo' => input::get('pranNo'),
								'npsFileNo' => input::get('npsFileNo'),
								),
								array(
								'userID' => input::get('username'),
								'homeTown' => input::get('homeTown'),
								'taluka' => input::get('taluka'),
								'district' => input::get('district'),
								'state' => input::get('state'),
								'nearestRlyStation' => input::get('nearestRlyStation')
								)
							);
					
					echo "About to redirect";
					redirect::to('applicationsBox.php?page=adminPanel');

				}
				catch(exception $e){
					die($e->getMessage());
				}

			// }else{
			// 	$errors = $validation->get_errors();
			// 	foreach($errors as $error){
			// 		echo $error . "<br/>"; 
			// 	}
			// }			
		}
	}
?>
<style>
	#registration_tb{
		width:800px;
		padding:50px;
		margin: 0 auto;
		background-color: white;
		border-radius: 2px;
		color:black;

	}
	
</style>
<div id = 'registration_tb'>
	<h3>LOGIN INFO</h3>
	<form action = "register.php" method = "POST" class="pure-form pure-form-aligned">
			<div class = "pure-control-group">
				<label for = "name">Name: </label>
				<input type = "text" id = "name" value = "<?php echo escape(input::get('name'));?>" name = "name" width = "200px">
			</div>

			<div class = "pure-control-group">
				<label for = "username">Employee No.: </label>
				<input type="text" name = "username" id="username" value="<?php echo escape(input::get('username'));?>" autocomplete="off">
			</div>

			<div class = "pure-control-group">
				<label  for = "password">Password: </label>
				<input type = "password" id="password" name="password">
			</div>

			<div class = "pure-control-group">
				<label for = "type">Type: </label>
				<select name="type" id= "type"> 
					<option value = 'permanent_staff_faculty'>Permanent Staff(Faculty)</option>
					<option value = 'permanent_staff_other'>Permanent Staff(Other)</option>
					<option value = 'contractual_staff'>Non-Permanent</option>
				</select>
			</div>

			<div class = "pure-control-group">
				<label for = "actorrank">Permissions: </label>
				<select name="actorrank" id = "actorrank"> 
					<option value = "0" selected = "selected">User</option>
					<?php 
						if($user->data()->id >= 2) echo '<option value = "1">Admin</option>';
					?>						
				</select>
			</div>

			<div class = "pure-control-group">
				<label for = "password_again">Confirm Password: </label>
				<input type = "password" id="password_again" name="password_again">
			</div>

	<h3>PROFILE INFO</h3>
			<div class = "pure-control-group">
				<label>Designation</label>
				<input type="text" id = 'designation' name = 'designation' value = "<?php echo escape(input::get('designation'));?>"> 			
			</div>
			<div class = "pure-control-group">
				<label>Department</label>
				<input type="text" id = 'department' name = 'department' value = "<?php echo escape(input::get('department'));?>"> 
			</div>
			<div class = "pure-control-group">
				<label>Age</label>
				<input type="text" id = 'Age' name = 'Age' value = "<?php echo escape(input::get('Age'));?>">  
			</div>
			<div class = "pure-control-group">
				<label>Sex</label>
				<input type="text" id = 'Sex' name = 'Sex' value = "<?php echo escape(input::get('Sex'));?>"> 
			</div>

	<h3>BIODATA</h3>
			<div class = "pure-control-group">
				<label>Father's Name</label>
				<input type = 'text' id = 'fathersname' name = 'fathersname' value = "<?php echo escape(input::get('fathersname'));?>">
			</div>
			<div class = "pure-control-group">
				<label>Spouse Name</label>
				<input type = 'text' id = 'spousename' name = 'spousename' value = "<?php echo escape(input::get('spousename'));?>">
			</div>
			<div class = "pure-control-group">
				<label>Nationality (or Eligibity Certificate Date)</label>
				<input type = 'text' id = 'nationality' name = 'nationality' value = "<?php echo escape(input::get('nationality'));?>">
			</div>
			<div class = "pure-control-group">
				<label>Religion</label>
				<input type = 'text' id = 'religion' name = 'religion' value = "<?php echo escape(input::get('religion'));?>">
			</div>
			<div class = "pure-control-group">
				<label>SC/ST(NA if neither)</label>
				<input type = 'text' id = 'scst' name = 'scst' value = "<?php echo escape(input::get('scst'));?>">
			</div>
			<div class = "pure-control-group">
				<label>Name of Caste</label>
				<input type = 'text' id = 'casteName' name = 'casteName' value = "<?php echo escape(input::get('casteName'));?>">
			</div>
			<div class = "pure-control-group">			
				<label>DOB</label>
				<input type = 'date' id = 'DOB' name = 'DOB' value = "<?php echo escape(input::get('DOB'));?>">
			</div>
			<label><strong>Educational Qualifications</strong></label>
			<div class = "pure-control-group">
				<label>When appointed</label>
				<input type = 'text' id = 'appointed' name = 'appointed' value = "<?php echo escape(input::get('appointed'));?>">
			</div>
			<div class = "pure-control-group">
				<label>Subsequently acquired</label>
				<input type = 'text' id = 'subsequent' name = 'subsequent' value = "<?php echo escape(input::get('subsequent'));?>">
			</div>
			<div class = "pure-control-group">
				<label>Height(also mention the units)</label>
				<input type = 'text' id = 'height' name = 'height' value = "<?php echo escape(input::get('height'));?>">
			</div>
			<div class = "pure-control-group">
				<label>Identification Marks(Seperate with commas)</label>
				<textarea cols = "60" rows = "10" id = 'identification' name = 'identification' text = "<?php echo escape(input::get('identification'));?>"></textarea>	
			</div>
			<div class = "pure-control-group">
				<label>Permanent Home Address</label>
				<textarea cols = "60" rows = "10" id = 'address' name = 'address' text = "<?php echo escape(input::get('address'));?>"></textarea>
		 	</div>

	<h3>CERTIFICATION AND ATTESTATION</h3>
			<label><strong>Medical Examination</strong></label>
			<div class = "pure-control-group">
				<label>Conducted By</label>
				<input type="text" id = 'medicalTestBy' name = 'medicalTestBy' value = "<?php echo escape(input::get('medicalTestBy'));?>">  
			</div>
			<div class = "pure-control-group">
				<label>Date</label>
				<input type="date" id = 'medicalTestDate' name = 'medicalTestDate' value = "<?php echo escape(input::get('medicalTestDate'));?>">
			</div>
			<div class = "pure-control-group">
				<label>Serial No.</label>
				<input type = "text" id = 'medicalTestSrNo' name = 'medicalTestSrNo' value = "<?php echo escape(input::get('medicalTestSrNo'));?>">
			</div>
			<div class = "pure-control-group">
				<label>Character and Antecedents(Sr. No)</label>
				<input type = 'text' id = 'characterSrNo' name = 'characterSrNo' value = "<?php echo escape(input::get('characterSrNo'));?>">
			</div>
			<div class = "pure-control-group">
				<label>Verification of Biodata(Sr. No.)</label>
				<input type = "text" id = 'biodataVerificationSrNo' name = 'biodataVerificationSrNo' value = "<?php echo escape(input::get('biodataVerificationSrNo'));?>">
			</div><br/>
			<label>Requirement Benefit Scheme</label>
			<div class = "pure-control-group">			
				<label>Scheme Elected</label>
				<input type = "text" id = 'schemeElected' name = 'schemeElected' value = "<?php echo escape(input::get('schemeElected'));?>">
			</div>
			<div class = "pure-control-group">
				<label>File No.</label>
				<input type = "text" id = 'schemeFileNo' name = 'schemeFileNo' value = "<?php echo escape(input::get('schemeFileNo'));?>">
			</div>
			<div class = "pure-control-group">
				<label>Date</label>
				<input type = 'date' id = 'schemeDate' name = 'schemeDate' value = "<?php echo escape(input::get('schemeDate'));?>">
			</div>
			<div class = "pure-control-group">
				<label>PRAN No.</label>
				<input type = 'text' id = 'pranNo' name = 'pranNo' value = "<?php echo escape(input::get('pranNo'));?>">
			</div>
			<div class = "pure-control-group">
				<label>Nomination for NPS(Sr. No.)</label>
				<input type = 'text' id = 'npsFileNo' name = 'npsFileNo' value = "<?php echo escape(input::get('npsFileNo'));?>">
			</div>

		<h3> DECLARATION OF HOME TOWN FOR LTC</h3>
			<div class = "pure-control-group">
				<label>Hometown</label>
				<input type = 'text' id = 'homeTown' name = 'homeTown' value = "<?php echo escape(input::get('homeTown'));?>">
			</div>
			<div class = "pure-control-group">
				<label>Taluka</label>
				<input type = 'text' id = 'taluka' name = 'taluka' value = "<?php echo escape(input::get('taluka'));?>">
			</div>
			<div class = "pure-control-group">
				<label>District</label>
				<input type = 'text' id = 'district' name = 'district' value = "<?php echo escape(input::get('district'));?>">
			</div>
			<div class = "pure-control-group">
				<label>State</label>
				<input type = 'text' id = 'state' name = 'state' value = "<?php echo escape(input::get('state'));?>">
			</div>
			<div class = "pure-control-group">
				<label>Nearest Railway Station</label>
				<input type = 'text' id = 'nearestRlyStation' name = 'nearestRlyStation' value = "<?php echo escape(input::get('nearestRlyStation'));?>">
			</div>
			<em>Reasons for declaration</em>
			<div class = "pure-control-group">
				<label>Reason 1 :</label>
				<input type = 'text' id = 'reasonOneForDeclaration' name = 'reasonOneForDeclaration' value = "<?php echo escape(input::get('reasonOneForDeclaration'));?>">
			</div>
			<div class = "pure-control-group">
				<label>Reason 2 :</label>
				<input type = 'text' id = 'reasonTwoForDeclaration' name = 'reasonTwoForDeclaration' value = "<?php echo escape(input::get('reasonTwoForDeclaration'));?>">
			</div>

			<input type = "hidden"	name = "token" value = "<?php echo token::generate();?>">			
			<div class = 'pure-control'>
				<input type = "submit" class='pure-button pure-button-primary' onclick="navigate('adminPanel.php');" value = 'Register' width= "100px">
			</div>
	</form>
</div>
