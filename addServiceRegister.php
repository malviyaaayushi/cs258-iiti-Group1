<?php
	include  'core/init.php';
	$user = new user();	
	if(token::check(input::get('token'))){
		if(input::exists()){				
				try{

					$user->add_service_register_entry(array(
							'userID' => input::get('userBeingUpdated'),
							'postAndPayDescription' => input::get('description'),
							'permanentOrTemporary' => input::get('permanentOrTemporary'),
							'incumbent' => input::get('incumbent'),
							'postHeldPermanently' => input::get('postHeldPermanently'),
							'payInPermanentPost' => input::get('payInPermanentPost'),
							'officiatingPay' => input::get('officiatingPay'),
							'otherPay' => input::get('otherPay'),
							'fromPeriod' => input::get('fromPeriod'),
							'toPeriod' => input::get('toPeriod'),
							'events1to8' => input::get('events1to8'),
							'leaveDescription' => input::get('leaveDescription'),
							'punishmentReference' => input::get('punishmentReference'),
							'remarks' => input::get('remarks'),
						));
					echo "Added entry!";
					
					echo "About to redirect";
					redirect::to('applicationsBox.php?page=adminPanel');

				}
				catch(exception $e){
					die($e->getMessage());
				}
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
	<form action = "addServiceRegister.php" method = "POST" class="pure-form pure-form-aligned">
			<div class = "pure-control-group">
				<label for = "userBeingUpdated">UserID being updated: </label>
				<input type = "text" id = "userBeingUpdated" value = "<?php echo escape(input::get('userBeingUpdated'));?>" name = "userBeingUpdated" width = "200px">
			</div>
			<h3>SERVICE REGISTER ENTRY</h3>
			<div class = "pure-control-group">
				<label for = "description">Description of Post and Pay </label>
				<input type = "text" id = "description" value = "<?php echo escape(input::get('description'));?>" name = "description" width = "200px">
			</div>			
			<div class = "pure-control-group">
				<label for = "permanentOrTemporary">Whether Post is permanent or temporary</label>
				<input type="text" name = "permanentOrTemporary" id = "permanentOrTemporary"  autocomplete="off">
			</div>
			<div class = "pure-control-group">
				<label  for = "incumbent">Whether the incumbent posted permanently or to officiate</label>
				<input type = "text" id="incumbent" name="incumbent">
			</div>
			<div class = "pure-control-group">
				<label for = "postHeldPermanently">Post held permanently </label>
				<input type = "text" name = "postHeldPermanently" id="postHeldPermanently" autocomplete="off">
			</div>

			<div class = "pure-control-group">
				<label for = "payInPermanentPost">Pay in the permanent post</label>
				<input type = "text" name = "payInPermanentPost" id="payInPermanentPost" autocomplete="off">
			</div>
			<div class = "pure-control-group">
				<label for = "officiatingPay">Officiating Pay </label>
				<input type = "text" name = "officiatingPay" id="officiatingPay"  autocomplete="off">
			</div>
			<div class = "pure-control-group">
				<label for = "otherPay"> Other emoluments falling under 'pay' </label>
				<input type = "text" name = "otherPay" id="otherPay"  autocomplete="off">
			</div>
			<div class = "pure-control-group">
				<label for = "fromPeriod">From </label>
				<input type = "date" name = "fromPeriod" id="fromPeriod"  autocomplete="off">
			</div>
			<div class = "pure-control-group">
				<label for = "toPeriod"> To </label>
				<input type = "date" name = "toPeriod" id="toPeriod"  autocomplete="off">
			</div>
			<div class = "pure-control-group">
				<label for = "events1to8"> Events affecting Columns 1 to 8</label>
				<input type = "text" name = "events1to8" id="events1to8"  autocomplete="off">
			</div>
			<div class = "pure-control-group">
				<label for = "leaveDescription">Nature and duration of leave taken </label>
				<input type = "text" name = "leaveDescription" id="leaveDescription"  autocomplete="off">
			</div>
			<div class = "pure-control-group">
				<label for = "punishmentReference"> Reference to any recorded punishment, censure, award etc. </label>
				<input type = "text" name = "punishmentReference" id="punishmentReference"  autocomplete="off">
			</div>
			<div class = "pure-control-group">
				<label for = "remarks"> Remarks </label>
				<input type = "text" name = "remarks" id="remarks"  autocomplete="off">
			</div>
			<input type = "hidden"	name = "token" value = "<?php echo token::generate();?>">			
			<div class = 'pure-control'>
				<input type = "submit" class='pure-button pure-button-primary' onclick="navigate('adminPanel.php');" value = 'Update' width= "100px">
			</div>
	</form>
</div>


