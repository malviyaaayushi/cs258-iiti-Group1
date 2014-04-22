function getXmlHttpRequestObject(){
	if(window.XMLHttpRequest){
		return new XMLHttpRequest();
	}else if(window.ActiveXObject){
		return new ActiveXObject("Microsoft.XMLHTTP");
	}else{
		alert("Your browser does not support Ajax, time to upgrade!");
	}
}

var ajaxObject = getXmlHttpRequestObject();

function populateTables(){
	if(ajaxObject.readyState == 4 || ajaxObject.readyState == 0){
		var str = encodeURIComponent(document.getElementById('anotherUserId').value);
		ajaxObject.onreadystatechange = function(){
			if(ajaxObject.readyState == 4 && ajaxObject.status == 200){
				document.getElementById('tables').innerHTML = ajaxObject.responseText;
			}		
		}
		ajaxObject.open("GET", "serviceBookTables.php?id=" + str, true);
		ajaxObject.send(null);
	}
}	