 function biodataClick(event){
	document.getElementById('biodataTable').style.display = "block";		
	document.getElementById('certificateTable').style.display = "none";		
	document.getElementById('qualifyingTable').style.display = "none";
	document.getElementById('foreignTable').style.display = "none";
}

function certificateClick(event){
	document.getElementById('biodataTable').style.display = "none";		
	document.getElementById('certificateTable').style.display = "block";
	document.getElementById('qualifyingTable').style.display = "none";
	document.getElementById('foreignTable').style.display = "none";
}

function qualifyingClick(event){
	document.getElementById('biodataTable').style.display = "none";		
	document.getElementById('certificateTable').style.display = "none";
	document.getElementById('qualifyingTable').style.display = "block";
	document.getElementById('foreignTable').style.display = "block";	
}

var clicked = 0;
function showTable(){
		var table = document.getElementById('part1');
		var button = document.getElementById('expand');
		if(clicked == 0){			
			table.style.marginLeft = "-800px";
			clicked = 1;
			expand.innerHTML = "<<";
		}
		else{
			clicked  = 0;
			table.style.marginLeft = "0px";	
			expand.innerHTML = "Expand >>";
		}

}