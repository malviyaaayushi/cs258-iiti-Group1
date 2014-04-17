 function biodataClick(event){
	document.getElementById('biodataTable').style.visibility = "visible";		
	document.getElementById('certificateTable').style.visibility = "hidden";		
	document.getElementById('qualifyingTable').style.visibility = "hidden";
}

function certificateClick(event){
	document.getElementById('biodataTable').style.visibility = "hidden";		
	document.getElementById('certificateTable').style.visibility = "visible";
	document.getElementById('qualifyingTable').style.visibility = "hidden";
}

function qualifyingClick(event){
	document.getElementById('biodataTable').style.visibility = "hidden";		
	document.getElementById('certificateTable').style.visibility = "hidden";
	document.getElementById('qualifyingTable').style.visibility = "visible";
}