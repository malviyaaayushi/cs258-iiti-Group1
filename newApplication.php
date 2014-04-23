	<div style="background:black; color:white; width=100%; padding-left:20px; line-height:2.5;">
		New Application
		<button onclick="close_new_application();" class="pure-button-close">x</button>
	</div>

	<div style="background:white;height:100%;">
		<div style="width:100%;line-height:2.5;">
			<b >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Application:</b>
			<select id="applicationType" name="applicationType" class="pure-input-1-1" onchange="get_new_application_fields(this.value);">
				<option value="casualLeaveApplication" selected>Casual Leave Application</option>
				<option value="nonClLeaveApplication">Non Casual Leave Application</option>
			</select>
		</div>

		<hr style="width:100%;margin-bottom:0;display:block;border:1px #CCC dotted;"/>
		
		<form class="pure-form pure-form-aligned" style="overflow-y:scroll;height:79%;">
			<fieldset id="newApplicationFields">
				<?php include 'casualLeaveApplication.php'; ?>
			</fieldset>
		</form>

	    	<hr style="width:100%;margin-top:0;"/>

	    	<div class="pure-control-group" style="margin-left:2%;">
	      		<button type="submit" class="pure-button pure-button-primary" style="float:left;" onclick="submit_new_application();">Send</button>
	        </div>
	</div>
	
	
<script type="text/javascript">

	function get_new_application_fields(applicationType){
		if(window.XMLHttpRequest){
	            xmlhttp = new XMLHttpRequest();
	        }else{
	            xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
	        }
	        xmlhttp.onreadystatechange = function(){
	            if(xmlhttp.readyState==4 && xmlhttp.status==200){
	                document.getElementById('newApplicationFields').innerHTML = xmlhttp.responseText;
	            }
	        }
	        xmlhttp.open('GET', applicationType+'.php', true);
	        xmlhttp.send();
	}

	function submit_new_application(){
		if(window.XMLHttpRequest){
	            xmlhttp = new XMLHttpRequest();
	        }else{
	            xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
	        }
	        xmlhttp.onreadystatechange = function(){
	            if(xmlhttp.readyState==4 && xmlhttp.status==200){
	            	alert(xmlhttp.responseText);
	                window.location.reload();
	            }
	        }
	        var query='';
	        var applicationType = document.getElementById('applicationType').value;
	        if(applicationType=='casualLeaveApplication'){
	        	query = "fromDate="+ document.getElementById('clFromDate').value + "&toDate="+document.getElementById('clToDate').value + "&leaveReason="+ document.getElementById('clLeaveReason').value +
	        	 "&recommendingAuthority=" +document.getElementById('clRecommendingAuthority').value + "&approvingAuthority=" +document.getElementById('clApprovingAuthority').value;
	        	xmlhttp.open("POST", "submitCasualLeaveApplication.php", true);
	        }else if(applicationType=='nonClLeaveApplication'){
	        	query = "fromDate="+ document.getElementById('nonClFromDate').value + "&toDate="+document.getElementById('nonClToDate').value + "&leaveReason="+ document.getElementById('nonClLeaveReason').value +
	        	 "&recommendingAuthority=" +document.getElementById('nonClRecommendingAuthority').value + "&approvingAuthority=" +document.getElementById('nonClApprovingAuthority').value;
	        	query = query + "&leaveType="+ document.getElementById('nonClLeaveType').value + "&leaveAddress="+document.getElementById('nonClLeaveAddress').value + "&agreeToTerms="+document.getElementById('nonClAgreeToTerms').value;
	        	if(document.getElementById('nonClAvailConcessionYes').value=='1'){
	        		query = query + "&availConcession=1";
	        	}else if(document.getElementById('nonClAvailConcessionNo').value=='1'){
	        		query = query + "&availConcession=0";
	        	}
	        	xmlhttp.open("POST", "submitNonClLeaveApplication.php", true);
	        }
	        xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
			xmlhttp.setRequestHeader('Content-length',query.length);
			xmlhttp.setRequestHeader('Connection', 'close');
	        xmlhttp.send(query);
	}

</script>