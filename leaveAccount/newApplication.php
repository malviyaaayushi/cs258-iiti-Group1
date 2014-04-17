<?php



?>

	<div style="background:black; color:white; width=100%; padding:0.4em 2% 0.4em 2%; height:10%;">
		New Application
		<button onclick="close_new_application();" class="pure-button-close">x</button>
	</div>
	<div style="background:white;height:100%;">
		<textarea  rows="1" style="width:100%; margin-top:-20px; padding:0.2em 2em 0.2em 2%;height:5%;">To:</textarea>
		<div style="width:100%; margin-top:-2px; padding:0.4em 2em 0.4em 2%;height:5%;">
			<b style="text-size:80%;">Application:</b>
			<select name="applicationType" class="pure-input-1-1" style="text-size:80%;" onchange="get_new_application_fields(this.value);">
				<option value="casualLeaveApplication" selected>Casual Leave Application</option>
				<option value="nonClLeaveApplication">Non Casual Leave Application</option>
			</select>
		</div>

		<hr style="width:100%;margin-bottom:0;"/>
		
		<form class="pure-form pure-form-aligned" style="overflow-y:scroll;height:75%;">
			<fieldset id="newApplicationFields">
				<?php include 'casualLeaveApplication.php'; ?>
			</fieldset>
		</form>

	    	<hr style="width:100%;margin-top:0;"/>

	    	<div class="pure-control-group" style="height:10%;margin-left:2%;">
	      		  <button type="submit" class="pure-button pure-button-primary" style="float:left;padding:0.2em 1em 0.2em 1em;">Send</button>
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

</script>