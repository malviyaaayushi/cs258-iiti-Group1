	<?php
		function displayQualifyingServices($array){
		$string  = '';		
		foreach($array->results() as $item){			
			$string .= '<tr><td>' . $item->from . '</td>' .
					  '<td>' . $item->to . '</td>' .
					  '<td>' . $item->postHeld . '</td>' .
					  '<td>' . $item->purpose . '</td></tr>';
		
		}
		return $string;
	}

	function display_part1($array){
		$string  = '';				
		foreach($array->results() as $item){			
			$string .= '<tr><td>' . $item->postAndPayDescription . '</td>' .
					  '<td>' . $item->permanentOrTemporary . '</td>' .
					  '<td>' . $item->incumbent . '</td>' .
					  '<td>' . $item->postHeldPermanently . '</td>' . 
					  '<td>' . $item->payInPermanentPost . '</td>' . 
					  '<td>' . $item->officiatingPay . '</td>'.
					  '<td>' . $item->otherPay . '</td>'.
					  '</tr>';		
		}		
		echo $string;
		return $string;
	}

	function display_part2($array){
		$string  = '';				
		foreach($array->results() as $item){			
			$string .= '<tr><td>' . $item->fromPeriod . '</td>' .
					  '<td>' . $item->toPeriod . '</td>' .
					  '<td>' . $item->events1to8 . '</td>' .
					  '<td>' . $item->leaveDescription . '</td>' . 
					  '<td>' . $item->punishmentReference . '</td>'.
					  '<td>' . $item->remarks . '</td>'.
					  '</tr>';		
		}
		return $string;
	}

?>