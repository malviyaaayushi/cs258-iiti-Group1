       

<div class="searchBox l-box-lrg pure-g">
    <form class="pure-form" id="search_form" style='display:inline;'>
        
<?php 

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$pageName = $_GET['pageName'];
		if(!empty($pageName)){

			if($pageName=="inbox"){
				echo "<input type='text' id = 'searchBox' class='pure-form input-rounded' placeholder='Search...' style='width:40%;margin:0;' onkeyUp='search(this.value, \"inbox\")';>";
			}else if($pageName=="outbox"){
				echo "<button class='pure-button pure-button-primary' onclick='deleteApplications();''>Cancle Leave</button>
				<input type='text' id = 'searchBox' class='pure-form input-rounded' placeholder='Search...' style='width:40%;margin:0;' onkeyUp='search(this.value, \"outbox\")';>";
			}else if($pageName=="trashBox"){
				echo "<input type='text' id = 'searchBox' class='pure-form input-rounded' placeholder='Search...' style='width:40%;margin:0;' onkeyUp='search(this.value, \"trashBox\")';>";
			}
			
	

?>
    
    </form>
</div>
<div id='box_content'>
    <?php 
	    	if($pageName=='inbox'){
	    		include 'inbox.php'; 
	    	}else if($pageName=='outbox'){
	    		include 'outbox.php'; 
	    	}else if($pageName=='trashBox'){
	    		include 'trashBox.php'; 
	    	}
		}
	}
    ?>
</div>

