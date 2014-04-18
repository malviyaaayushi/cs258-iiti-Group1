

	    	<table style="width:90%;align:center;">
	    		<tr>
	    			<td>Nature of Leave:</td>
	    			<td>
	    				<select id="nonClLeaveType" name="leaveType" class="pure-input-1-1">
						<option value="specialClBalance" selected>Special CL </option>
						<option value="specialLeaveBalance"> Special Leave</option>
						<option value="halfPayLeaveBalance"> Half Pay Leave </option>
						<option value="earnedLeaveBalance"> Earned Leave</option>
						<option value="extraordinaryLeaveBalance"> Extraordinary Leave</option>
						<option value="maternityLeaveBalance"> Maternity Leave</option>
						<option value="hospitalLeaveBalance"> Hospital Leave</option>
						<option value="quarantineLeaveBalance ">Quarantine Leave</option>
						<option value="leaveNotLeaveBalance"> Leave Not Leave </option>
						<option value="sabbaticalLeaveBalance">Sabbatical Leave</option>
						<option value="vacationBalance"> Vacation</option>
						
					</select>
	    			</td>
	    		</tr>
	    		<tr>
	    			<td>Duration of leave required:</td>
	    			<td>
	    				<input id="nonClFromDate" name="fromDate" type="date">
	    				to
	    				<input id="nonClToDate" name="toDate" type="date">
	    			</td>	    				
	    		</tr>
	    		<tr>
	    			<td>Grounds for leave:</td>
	    			<td>   
	    				<textarea id="nonClLeaveReason" name="leaveReason" maxlength="500" rows="4" cols="40" placeholder="Do not use more than 100 words"></textarea>
	        		</td>
	    		</tr>
	    		<tr>
	    			<td>Do you want travel leave concession during the ensuring leave:</td>
	    			<td>
	    				<input id="nonClAvailConcessionYes" type="radio" name="availConcession" value="1" checked> &nbsp;yes</input>&nbsp;&nbsp;	    				
					<input id="nonClAvailConcessionNo" type="radio" name="availConcession" value="0" >&nbsp;no</input>
				</td>
	    		</tr>
	    		<tr>
	    			<td>Address while on leave:</td>
	    			<td>
	    				<textarea id="nonClLeaveAddress" name="leaveAddress" maxlength="500" rows="3" cols="40" placeholder="Do not use more than 100 words"></textarea>
	        		</td>
	    		</tr>
	    		<tr>
	    			<td>Recommending Authority:</td>
	    			<td>
	    				<input id="nonClRecommendingAuthority" name="recommendingAuthority" type="text" placeholder="Recommending Authority">
	        		</td>
	    		</tr>
	    		<tr>
	    			<td>Sanctioning Authority:</td>
	    			<td>
	    				<input id="nonClApprovingAuthority" name="approvingAuthority" type="text" placeholder=" Sanctioning Authority">
	    			</td>
	    		</tr>
	    	</table>

	    	<p style="margin-left:10%;">
	    		A. In the event of my resignation or voluntary retirement from the service. I undertake to refund:<br>
		        &nbsp;&nbsp;&nbsp;&nbsp;   1. The difference between the leave salary drawn during commuted leave and that admissible during half pay leave.<br>
		        <br>B.  Undertake to refund the leave salary drawn for the period of earned leave which would not have been admissible, had leave not been credited in advance in the event of my resignation, Voluntary retirement, dismissal or removal from service or removal from service or in the event of termination of my services.
			 
	    	</p>
	    	<p style="margin-left:10%;">
	    		<input id="nonClAgreeToTerms" name="agreeToTerms" type="checkbox" checked>I agree
	    	</p>
	    	

		

