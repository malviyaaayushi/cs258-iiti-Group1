       
<div class="searchBox l-box-lrg pure-g">
            <div class="search_box_wrapper">
                <div class="pure-form" id="search_form" style='display:inline;vertical-align:center;line-height:90px;padding-left:30px;'>
        
<?php 

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		$pageName = $_GET['pageName'];
		if(!empty($pageName)){

			if($pageName=="inbox"){
				echo "<input type='text' id = 'searchBox' class='pure-form input-rounded' placeholder='Search...' style='width:40%;margin:0;' onkeyUp='search(this.value, \"inbox\")';>";
			}else if($pageName=="outbox"){
				echo "<button class='pure-button pure-button-primary' onclick='deleteApplications();'>Cancel Leave</button>
				<input type='text' id = 'searchBox' class='pure-form input-rounded' placeholder='Search...' style='width:40%;margin:0;' onkeyUp='search(this.value, \"outbox\")';>";
			}else if($pageName=="trashBox"){
				echo "<input type='text' id = 'searchBox' class='pure-form input-rounded' placeholder='Search...' style='width:40%;margin:0;' onkeyUp='search(this.value, \"trashBox\")';>";
			}
			
	

?>
    
    </div>
</div>
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

