<?php
	require_once 'core/init.php';
	require("includes/functions.php"); 
	require("includes/header.php");
	include("includes/navigation.php");
		// If the user is an admin only then continue, else redirect to the profile page
		if($user->data()->actorrank < 1)
			redirect::to('profile.php');
		
		if(token::check(input::get('token'))){
			if(input::exists()){
				$validate = new validate();
				$validation = $validate->check($_POST, array(
					'username' => array(
									'required' => true,
									'min' => 2,
									'max' =>30,
									'unique' => 'login_credentials_tb'),
					'password' => array(
									'required' => true,
									'min' => 2),
					'password_again' => array(
									'required' => true,
									'matches' => 'password'),
					'name' => array(
								'required' => true,
								'min' => 2,
								'max' => 50,
								),

					));

				if($validation->get_passed()){
					$user = new user();
					echo $salt = hash::salt(32);

					try{
						$user->create(array(
									'username' => input::get('username'),
									'name' => input::get('name'),
									'password' => hash::make(input::get('password'), $salt),
									'type' => input::get('type'),
									'actorrank' => input::get('actorrank'),
									'salt' => $salt)
								);

						session::flash('home', 'You have successfully been registered');
						redirect::to('login.php');

					}
					catch(exception $e){
						die($e->getMessage());
					}

				}else{
					$errors = $validation->get_errors();
					foreach($errors as $error){
						echo $error . "<br/>"; 
					}
				}
			}
		}
?>
<style type="text/css">
	form{
		float: left;
	}
	#certificationForm{
		margin-left:-545px;
		visibility: hidden;
	}
	li{
		cursor:pointer;
	}
	#buttons{
		width:680px;	
	}
	.wrapper_registration{
	position: relative;
	border-radius:2px;
	background-color:#f39c12;
	padding-top: 50px;
	padding-left: 260px;
	height:1000px;
	width: 900px;
	margin: 50px auto;
}
</style>
<div class = 'wrapper_registration' id = 'wrapper'>	
	<div id = 'buttons'>
		<button class='pure-button pure-button-primary' id = 'biodata' style="float:left;visibility:hidden;">Previous</button>
		<button class='pure-button pure-button-primary' id = 'certification' style="float:right;">Next</button>
		<button class='pure-button pure-button-primary' id = 'submit' style="float:right; " href = 'register.php'>Submit</button>
	</div>
	<form action = "" method = "POST" class="pure-form pure-form-aligned" id = 'biodataForm'>
		<div class = "pure-control-group">
			<label>Name</label>
			<input type = "text" id = 'name'>
		</div>
		<div class = "pure-control-group">
			<label>Father's Name</label>
			<input type = 'text' id = 'fathersname'>
		</div>
		<div class = "pure-control-group">
			<label>Spouse Name</label>
			<input type = 'text' id = 'spousename'>
		</div>
		<div class = "pure-control-group">
			<label>Nationality(or Eligibity Certificate Date)</label>
			<input type = 'text' id = 'nationality'>
		</div>
		<div class = "pure-control-group">
			<label>Religion</label>
			<input type = 'text' id = 'religion'>
		</div>
		<div class = "pure-control-group">
			<label>SC/ST(NA if neither)</label>
			<input type = 'text' id = 'scst'>
		</div>
		<div class = "pure-control-group">
			<label>Name of Caste</label>
			<input type = 'text' id = 'casteName'>
		</div>
		<div class = "pure-control-group">			
			<label>DOB</label>
			<input type = 'date' id = 'DOB'>
		</div>
		<label>Educational Qualifications</label>
		<div class = "pure-control-group">
			<label>When appointed</label>
			<input type = 'text' id = 'appointed'>
		</div>
		<div class = "pure-control-group">
			<label>Subsequently acquired</label>
			<input type = 'text' id = 'subsequent'>
		</div>
		<div class = "pure-control-group">
			<label>Height(also mention the units)</label>
			<input type = 'text' id = 'height'>
		</div>
		<div class = "pure-control-group">
			<label>Identification Marks(Seperate with commas)</label>
			<input type = "text" id = 'identification' style="width:500px;height:100px">
		</div>
		<div class = "pure-control-group">
			<label>Permanent Home Address</label>
			<input type = 'text' id = 'address' style="width:500px;height:200px">
		</div>
	</form>
	<form action = "" method = "POST" class="pure-form pure-form-aligned" id = 'certificationForm'>
		<label>Medical Examination</label>
		<div class = "pure-control-group">
			<label>Conducted By</label>
			<input type="text" id = 'medicalTestBy'> 
		</div>
		<div class = "pure-control-group">
			<label>Date</label>
			<input type="date" id = 'medicalTestDate'>
		</div>
		<div class = "pure-control-group">
			<label>Serial No.</label>
			<input type = "text" id = 'medicalTestSrNo'>
		</div>
		<div class = "pure-control-group">
			<label>Character and Antecedents(Sr. No)</label>
			<input type = 'text' id = 'characterSrNo'>
		</div>
		<div class = "pure-control-group">
			<label>Verification of Biodata(Sr. No.)</label>
			<input type = "text" id = 'biodataVerificationSrNo'>
		</div><br/>
		<label>Requirement Benefit Scheme</label>
		<div class = "pure-control-group">			
			<label>Scheme Elected</label>
			<input type = "text" id = 'schemeElected'>
		</div>
		<div class = "pure-control-group">
			<label>File No.</label>
			<input type = "text" id = 'schemeFileNo'>
		</div>
		<div class = "pure-control-group">
			<label>Date</label>
			<input type = 'date' id = 'schemeDate'>
		</div>
		<div class = "pure-control-group">
			<label>PRAN No.</label>
			<input type = 'text' id = 'pranNo'>
		</div>
		<div class = "pure-control-group">
			<label>Nomination for NPS(Sr. No.)</label>
			<input type = 'text' id = 'npsFileNo'>
		</div>
	</form>
</div>
<div class= "clearFloat"></div>
<?php include 'includes/footer.php';?>

<script>
	document.getElementById('biodata').onclick = function(event){
		document.getElementById('biodataForm').style.visibility = "visible";
		document.getElementById('certificationForm').style.visibility = "hidden";
		document.getElementById('biodata').style.visibility = "hidden";
		document.getElementById('certification').style.visibility = "visible";
	}
	document.getElementById('certification').onclick = function(event){
		document.getElementById('biodataForm').style.visibility = "hidden";
		document.getElementById('certificationForm').style.visibility = "visible";
		document.getElementById('biodata').style.visibility = "visible";
		document.getElementById('certification').style.visibility = "hidden";
	}

</script>

