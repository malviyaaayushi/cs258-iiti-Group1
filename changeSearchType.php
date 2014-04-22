<?php
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$type = $_GET['type'];
			echo "<script type='text/javascript'> alert(".$type.") </script>";
			if(!empty($type)){
				echo "<input type='text' id = 'searchBox' class='pure-form input-rounded' placeholder='Search...' style='width:40%;margin:0;' onkeyUp='search(this.value, \"".$type."\");'>";
			}
		
        }
?>