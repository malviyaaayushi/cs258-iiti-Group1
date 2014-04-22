<?php
	include  'core/init.php';
	$user = new user();	
	if(token::check(input::get('token'))){
		if(input::exists()){				
				try{

					if(isset($_POST['fromPrevious'])){
						$user->add_previous_services(array(
								'userID' => input::get('userBeingUpdated'),
								'from' => input::get('fromPrevious'),
								'to' => input::get('toPrevious'),
								'postHeld' => input::get('postHeld'),
								'purpose' => input::get('purpose'),
							));
						echo "Added entry!";
					}

					if(isset($_POST['fromForeign'])){
						$user->add_foreign_services(array(
								'userID' => input::get('userBeingUpdated'),
								'fromPeriod' => input::get('fromForeign'),
								'toPeriod' => input::get('toForeign'),
								'foreignEmployerDetails' => input::get('foreignEmployerDetails'),
								'LPCPFpayable' => input::get('LPCPFpayable'),
								'LPCPFreceived' => input::get('LPCPFreceived'),
								'MRNo' => input::get('MRNo'),
								'MRDate' => input::get('MRDate')
							));
					}
					
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
	<form action = "addServices.php" method = "POST" class="pure-form pure-form-aligned">
			<div class = "pure-control-group">
				<label for = "userBeingUpdated">UserID being updated: </label>
				<input type = "text" id = "userBeingUpdated" value = "<?php echo escape(input::get('userBeingUpdated'));?>" name = "userBeingUpdated" width = "200px">
			</div>
			
			<h3>PREVIOUS QUALIFYING SERVICE</h3>
			<div class = "pure-control-group">
				<label for = "from">From :</label>
				<input type="date" name = "fromPrevious" id = "fromPrevious"  autocomplete="off">
			</div>
			<div class = "pure-control-group">
				<label  for = "toPrevious">To  </label>
				<input type = "date" id="toPrevious" name="toPrevious">
			</div>
			<div class = "pure-control-group">
				<label for = "type">Post held  </label>
				<input type = "text" name = "postHeld" id="postHeld" autocomplete="off">
			</div>

			<div class = "pure-control-group">
				<label for = "purpose">Purposes for which it qualifies </label>
				<input type = "text" name = "purpose" id="purpose" autocomplete="off">
			</div>

			<h3>FOREIGN SERVICE </h3>
			<div class = "pure-control-group">
				<label for = "fromForeign">From </label>
				<input type = "date" name = "fromForeign" id="fromForeign"  autocomplete="off">
			</div>
			<div class = "pure-control-group">
				<label for = "toForeign"> To </label>
				<input type = "date" name = "toForeign" id="toForeign"  autocomplete="off">
			</div>
			<div class = "pure-control-group">
				<label for = "foreignEmployerDetails"> Post held and name of Foreign Employer</label>
				<input type = "text" name = "foreignEmployerDetails" id="foreignEmployerDetails"  autocomplete="off">
			</div>
			<div class = "pure-control-group">
				<label for = "LPCPFpayable">Leave and Pension / CPF Contribution payable by </label>
				<input type = "text" name = "LPCPFpayable" id="LPCPFpayable"  autocomplete="off">
			</div>
			<div class = "pure-control-group">
				<label for = "LPCPFreceived"> Leave and Pension / CPF Contribution actually received </label>
				<input type = "text" name = "LPCPFreceived" id="LPCPFreceived"  autocomplete="off">
			</div>
			<div class = "pure-control-group">
				<label for = "MRNo"> M.R. Number </label>
				<input type = "text" name = "MRNo" id="MRNo"  autocomplete="off">
			</div>
			<div class = "pure-control-group">
				<label for = "MRDate"> M.R. Date </label>
				<input type = "text" name = "MRDate" id="MRDate"  autocomplete="off">
			</div>

			<input type = "hidden"	name = "token" value = "<?php echo token::generate();?>">			
			<div class = 'pure-control'>
				<input type = "submit" class='pure-button pure-button-primary' onclick="navigate('adminPanel.php');" value = 'Update' width= "100px">
			</div>
	</form>
</div>

