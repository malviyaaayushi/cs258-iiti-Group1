

<script type="text/javascript">


    function submitUpdateUserDetailsForm(){
        if(window.XMLHttpRequest){
                xmlhttp = new XMLHttpRequest();
            }else{
                xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
            }
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState==4 && xmlhttp.status==200){
                    alert(xmlhttp.responseText);
                }
            }
            // Add your query here
            xmlhttp.open('GET', 'userLeaveUpdate.php?'+query, true);
            xmlhttp.send();
    }


</script>

<style type="text/css">	
	.container-user-detail{
		z-index: 2;
		width: auto;
		height: auto;
		padding: 10px;
		margin:0 auto;
		color:white;
		margin-top: 100px;
		border-radius: 5px;
	}
</style>

<div class="container-user-detail">

	<div class="pure-form pure-form-aligned">

		<div class = "pure-control-group">
			<label>User Id</label>
			<input type="int" id="userLeaveUpdateFormUserId"> 			
		</div>
		<div class = "pure-control-group">
			<label>Type of Leave</label>
			<select  id="userLeaveUpdateFormLeaveType" class="pure-input-1-1">
				<option value="specialLeaveBalance"> Special Leave </option>
				<option value="specialClBalance">Special CL </option>
				<option value="halfPayLeaveBalance"> Half Pay (Non-Commuted) Leave</option>
				<option value="commutedLeaveBalance"> Half Pay (Commuted) Leave </option>
				<option value="earnedLeaveBalance"> Earned Leave </option>
				<option value="extraordinaryLeaveBalance"> Extraordinary Leave </option>
				<option value="maternityLeaveBalance"> Maternity Leave </option>
				<option value="hospitalLeaveBalance"> Hospital Leave </option>
				<option value="quarantineLeaveBalance ">Quarantine Leave </option>
				<option value="leaveNotLeaveBalance"> Leave Not Leave </option>
				<option value="sabbaticalLeaveBalance">Sabbatical Leave </option>
				<option value="vacationBalance"> Vacation Balance</option>
			</select>
		</div>
		<div class = "pure-control-group">
			<label>New value</label>
			<input id="userLeaveUpdateFormNewValue" type="int">
		</div>
		<div class = "pure-control-group">
			<button  class='pure-button pure-button-primary' onclick="submitUserLeaveUpdateForm();">Submit</button>
		</div>
		
	</div>

</div>

<div class="container-user-detail">
	
	<table class="biodataTable" style="margin-top:100px;line-height:1;">
    		
    		<!-- Write your code for other user details -->

	</table>

	<!--button onclick="submitUpdateUserDetailsForm();">Submit</button-->

</div>
