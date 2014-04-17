<style type="text/css">	
	.container-user-detail{
		z-index: 2;
		width: 40%;
		height: 30%;
		padding: 10px;
		margin:0 auto;
		color:black;
		margin-top: 100px;
		background-color: rgba(0,0,0,0.7);
		border-radius: 5px;
	}
</style>

<div class="container-user-detail">
	<?php  
		include_once 'userLeaveUpdateForm.php';
	?>
</div>


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


<div class="container-user-detail">
	
	<table class="biodataTable" style="margin-top:100px;line-height:1;">
    		
    		<!-- Write your code for other user details -->

	</table>

	<!--button onclick="submitUpdateUserDetailsForm();">Submit</button-->

</div>
