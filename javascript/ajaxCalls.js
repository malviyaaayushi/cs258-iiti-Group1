function navigate(pageName){
        if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        }else{
            xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
        }
        xmlhttp.onreadystatechange = function(){
            if(xmlhttp.readyState==4 && xmlhttp.status==200){
                document.getElementById('navigation_content').innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open('GET', pageName, true);
        xmlhttp.send();
    }
   function navigate_box(pageName){
        if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        }else{
            xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
        }
        xmlhttp.onreadystatechange = function(){
            if(xmlhttp.readyState==4 && xmlhttp.status==200){
                document.getElementById('navigation_content').innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open('GET', 'boxContent.php?pageName='+pageName, true);
        xmlhttp.send();
    }
/*
   function get_navigate_box(pageName){
        if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        }else{
            xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
        }
        xmlhttp.onreadystatechange = function(){
            if(xmlhttp.readyState==4 && xmlhttp.status==200){
                document.getElementById('box_content').innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open('GET', pageName, true);
        xmlhttp.send();
    }
*/
    function change_search_type(toType){
        if(window.XMLHttpRequest){
            xmlhttp_change_search_type = new XMLHttpRequest();
        }else{
            xmlhttp_change_search_type = new ActiveXObject('Microsoft.XMLHTTP');
        }
        xmlhttp_change_search_type.onreadystatechange = function(){
            if(xmlhttp_change_search_type.readyState==4 && xmlhttp_change_search_type.status==200){
                document.getElementById('search_form').innerHTML = xmlhttp_change_search_type.responseText;
            }
        }
        xmlhttp_change_search_type.open('GET', 'changeSearchType.php?type='+toType, true);
        xmlhttp_change_search_type.send();
    }

    function compose(){
        document.getElementById('new_application').style.display = 'block';
    }

    function send_application(){
        document.getElementById('new_application').style.display = 'block';
    }

    function close_new_application(){
        document.getElementById('new_application').style.display = 'none';
    }