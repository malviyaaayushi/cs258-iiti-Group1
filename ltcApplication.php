
<form action="submitLtcApplication.php" method="POST" class="pure-form">
	<table>
    		<tr>
    			<td>User ID:</td>
    			<td>
    				<input id="ltcUserId" name="userId" type="text">
    			</td>	    				
    		</tr>
    		<tr>
    			<td>Block Year:</td>
    			<td>
    				<input id="ltcBlockYear" name="blockYear" type="text">
    			</td>	    				
    		</tr>
    		<tr>
    			<td>Duration of leave required:</td>
    			<td>
    				<input id="ltcFromDate" name="fromDate" type="date">
    				                to
    				<input id="ltcToDate" name="toDate" type="date">
    			</td>	    				
    		</tr>
		<tr>
			<td>Name of person for whom availed of: </td>
			<td><input id="ltcRelativeName" name="relativeName" maxlength="40" type="text"></input></td>
		</tr>
		<tr>
			<td>Relation of person for whom availed of: </td>
			<td><input id="ltcRelation" name="relation" maxlength="40" type="text"></td>
		</tr>
		<tr>
			<td>Home town: </td>
			<td><input id="ltcHomeTown" name="homeTown" maxlength="40" type="text"></td>
		</tr>
		<tr>
			<td>Other places: </td>
			<td><input id="ltcOtherPlaces" name="otherPlaces" maxlength="40" type="text"></td>
		</tr>
		<tr>
			<td>Amount Paid: </td>
			<td><input id="ltcAmountPaid" name="amountPaid" type="float"></td>
		</tr>
		<tr>
			<td>Certifying Officer: </td>
			<td><input id="ltcCertifyingOfficer" name="certifyingOfficer" type="float"></td>
		</tr>

	</table>
	<button type="submit">Submit</button>
</form>