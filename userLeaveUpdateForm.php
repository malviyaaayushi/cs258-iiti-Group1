
		User Id:
    		<input id="userLeaveUpdateFormUserId" type="int"></input>
    		<br>
    		
    		Type of Leave:
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
    		<br>

		New value: 
    		<input id="userLeaveUpdateFormNewValue" type="int"></input>
    		<br>    			

		<button onclick="submitUserLeaveUpdateForm();">Submit</button>	
    		<br>

