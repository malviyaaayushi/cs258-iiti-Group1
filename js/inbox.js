    function showApplication(leaveDetailId, location){
        if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        }else{
            xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
        }
        xmlhttp.onreadystatechange = function(){
            if(xmlhttp.readyState==4 && xmlhttp.status==200){
                document.getElementById('applicationContent').innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open('GET', 'showApplication.php?leaveDetailId='+leaveDetailId+'&location='+location, true);
        xmlhttp.send();
    }

    function approveApplication(leaveDetailId,comment){
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
        xmlhttp.open('GET', 'approveApplication.php?leaveDetailId='+leaveDetailId+'&comment='+comment, true);
        xmlhttp.send();          
    }

    function recommendApplication(leaveDetailId,comment){
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
        xmlhttp.open('GET', 'recommendApplication.php?leaveDetailId='+leaveDetailId+'&comment='+comment, true);
        xmlhttp.send();              
    }

    function rejectApplication(leaveDetailId,comment){
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
        xmlhttp.open('GET', 'rejectApplication.php?leaveDetailId='+leaveDetailId+'&comment='+comment, true);
        xmlhttp.send();              
    }

    function search(keyword, type){
        if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        }else{
            xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
        }
        xmlhttp.onreadystatechange = function(){
            if(xmlhttp.readyState==4 && xmlhttp.status==200){
                document.getElementById(type+'ApplicationsList').innerHTML = xmlhttp.responseText;  
            }
        }
        xmlhttp.open('GET', 'search.php?keyword='+keyword+'&type='+type, true);
        xmlhttp.send();
    }

    var allLeaves = new Array();

    function readyDeleteApplication(leaveDetailId, checked){
        if(checked==true){
            allLeaves.push(leaveDetailId);
        }else{
            for (var i = allLeaves.length - 1; i >= 0; i--) {
                if (allLeaves[i]==leaveDetailId) {
                    allLeaves[i] = "";
                    break;
                };
            };
        };
    }

    function deleteApplications(){ 
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
        xmlhttp.open('GET', 'deleteApplication.php?allLeaves='+JSON.stringify(allLeaves)+'&allLeavesCount='+allLeaves.length, true);
        xmlhttp.send();              
    }
    
