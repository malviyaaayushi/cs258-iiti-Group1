<?php    
    require_once 'core/init.php';
    require("includes/header.php"); 
    require("includes/functions.php");
    $user->biodata();
    $user->certificate();
    $user->qualifying_service();
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        $page = '"' . $page .'.php"';
    }
    else $page = '';
    echo "<body onload = 'navigate({$page})'>";
?>

<link rel="stylesheet" href="css/layouts/marketing.css">
<link rel="stylesheet" href="css/layouts/side-menu.css">
<style>
    body{
        width:100%;
        height:100%;
        min-width:1000px;  
        background-color: white;
    }
    #navigation{
        position:fixed;
        width:250px;
        line-height:2;
        float:left;
        height:100%;
        z-index:1;
        top:48px;
        background-image:url('background.jpg');        
    }
    #container{ 
        top:48px;         
        height:100%;
        min-width:1000px;
    }
    #navigation_content{
        top:48px;
        margin-left: 250px;
        height:100%;
    }
    #box_content{
        background-color: white;
        width: 100%;
        height: 100%;
        margin-top: 90px;
    }
    .searchBox {
        left:250px;        
        position:fixed;
        height:90px;
        width: 100%;
        background-image:url('background_search.jpg'); 
        z-index:1;
        top:48px;
    }
    .pseudoDiv{
        float:left;
        width:250px;
        height:100%;
    }
    #registration_tb > input{
        width:300px;
    }
    .search_box_wrapper{
        background:rgba(0,0,0, 0.7);
        left:250px; 
        position:fixed;
        height:90px;
        width: 100%;
        top:48px;
    }
    .highlight{
        background: white;
    }
</style>

<div id="navigation">
        <style type="text/css">
            .ul-nav{                
                background:rgba(0,0,0, 0.7);
                font-weight: 600;
            }   
            .ul-nav li a{
                color: white;
                text-shadow: 0.5px 0.5px 0.5px #111; 
                text-decoration: none;
            
            }
            .ul-nav li a:hover,
            .ul-nav li a:focus {
                background: #111;
            }
            #ulnav{
                margin-left: 0px;   
                height: 100%;
                padding-top: 48px;
                margin-top: 0px;
            }
            #ihatethis{
                color:white;
                background-color: #e74c3c;
            }
            #ihatethis:hover{
                background-color: #2c3e50;
                color:black;
            }
        </style>
        <ul class="ul-nav" id = 'ulnav'>
            <li>
                <a href="#" class="pure-button pure-button-primary" id = 'ihatethis' style="padding-left:20px;padding-right:20px;border-radius:2px;" onclick="compose();">Apply for Leave</a>
            </li>
            <li style="margin-top:20px;">
                <a href="#" id="inbox" onclick="navigate_box('inbox');">Inbox</a>
            </li>
            <li>
                <a href="#" id="outbox" onclick="navigate_box('outbox');">Outbox</a>
            </li>
            <li>
                <a href="#" id="trashBox" onclick="navigate_box('trashBox');">Trash Box</a>
            </li>
            <li>
                <a href="#" id="profile" onclick="navigate('profile');">Profile</a>
            </li>
            <li>
                <a href="#" id="servicebook" onclick="navigate('servicebook');">Service Book</a>
            </li>
            <li>
                <a href="#" id="leaveAccount" onclick="navigate('leaveAccount');">Leave Account</a>
            </li>
             <li>
                <a href="#" id="leaveTravelConcession" onclick="navigate('leaveTravelConcession');">LTC Record</a>
            </li>
            <li>
                <a href="#" id="LTCDeclaration" onclick="navigate('LTCDeclaration');">LTC Declaration</a>
            </li>
            <li>
                <a href="#" id="serviceRegister" onclick="navigate('serviceRegister');">Service Register</a>
            </li>
            <?php 
                if($user->data()->actorrank == 1){
                    echo '<li>
                            <a href = "#" onclick = "navigate(\'adminPanel\');">Admin Panel</a>
                        </li>'; 
                }
            ?>
        </ul>
</div>

<div id = 'pseudoDiv'></div>
<div id = 'container'> 
    <div id="navigation_content">
        <div class="searchBox l-box-lrg pure-g">
            <div class="search_box_wrapper">
                <form class="pure-form" id="search_form" style='display:inline;vertical-align:center;line-height:90px;padding-left:30px;'>
                    <input type="text" id="searchBox" class="pure-form input-rounded" placeholder="Search..." style="width:40%;margin:0;" onkeyup="search(this.value, &quot;inbox&quot;)" ;="">    
                </form>
            </div>
        </div>
        <div id='box_content' >
            <?php include 'inbox.php';?>
        </div>
    </div>

    <div id="new_application" style="width:40%;border:1px solid;box-shadow: 0px 0px 20px rgba(0,0,0,0.9);margin:0;padding:0;position:fixed;bottom:0;right:2em;height:70%;display:none;">
        <?php include 'newApplication.php'; ?>
    </div>
</div>

<script type="text/javascript" src = 'ajaxCalls.js'></script>
<script src="http://yui.yahooapis.com/3.14.1/build/yui/yui-min.js"></script>

<!-- Script to keep page from scrolling -->
<script>
    YUI().use('node-base', 'node-event-delegate', function (Y) {
        // This just makes sure that the href="#" attached to the <a> elements
        // don't scroll you back up the page.
        Y.one('body').delegate('click', function (e) {
            e.preventDefault();
        }, 'a[href="#"]');
    });</script>

<script type="text/javascript" src="js/trashBox.js"></script>
<script type="text/javascript" src="js/inbox.js"></script>
<script type="text/javascript"src="js/jquery.js"></script>
<script type="text/javascript" src = "javascript/biodata.js"></script>
<script type="text/javascript" src = 'javascript/ajaxSearch.js'></script>
<script>

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
        xmlhttp.open('GET', pageName+'.php', true);
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
    
    function compose(){
        document.getElementById('new_application').style.display = 'block';
    }

    function send_application(){
        document.getElementById('new_application').style.display = 'block';
    }

    function close_new_application(){
        document.getElementById('new_application').style.display = 'none';
    }

    function displayEarnedLeavesjs(){
       document.getElementById('leaveHistory').style.display = 'block';
       document.getElementById('leaveBalanceTable').style.display = 'none';
       document.getElementById('halfpayTable').style.display = 'none';
    }

    function displayLeavejs(LeaveType){
       document.getElementById('leaveHistory').style.display = 'none';
       document.getElementById('leaveBalanceTable').style.display = 'none';
       document.getElementById('halfpayTable').style.display = 'block';
      if(LeaveType=='halfPayLeaveBalance'){
       document.getElementById('halftable').style.display = 'block';
       document.getElementById('commutedtable').style.display = 'none';
       document.getElementById('leavenotduetable').style.display = 'none';
       }else if(LeaveType=='commutedLeaveBalance'){
       document.getElementById('halftable').style.display = 'none';
       document.getElementById('leavenotduetable').style.display = 'none';
       document.getElementById('commutedtable').style.display = 'block';
       }    
      else if(LeaveType=='leaveNotLeaveBalance'){
       document.getElementById('leavenotduetable').style.display = 'block';
       document.getElementById('commutedtable').style.display = 'none';
       document.getElementById('halftable').style.display = 'none';
      } 
    
    }

    function displayLeaveBalancejs(){
        document.getElementById('leaveHistory').style.display = 'none';
        document.getElementById('leaveBalanceTable').style.display = 'block';
        document.getElementById('halfpayTable').style.display = 'none';
       
    }

    function displayhalfPayLeavesjs(){
       document.getElementById('leaveHistory').style.display = 'none';
       document.getElementById('leaveBalanceTable').style.display = 'none';
       document.getElementById('halfpayTable').style.display = 'block';
       
    }
    
    function navigate_main_content(pageName){
        // for admin panel
        if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        }else{
            xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
        }
        xmlhttp.onreadystatechange = function(){
            if(xmlhttp.readyState==4 && xmlhttp.status==200){
                document.getElementById('mainContent').innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open('GET', pageName, true);
        xmlhttp.send();
    }

    function showUserToAdmin(userId){
        if(window.XMLHttpRequest){
                xmlhttp = new XMLHttpRequest();
            }else{
                xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
            }
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState==4 && xmlhttp.status==200){
                    document.getElementById('userLeaveRecords').innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open('GET', 'specificUserDetails.php?userId='+userId, true);
            xmlhttp.send();
    }

    function submitUserLeaveUpdateForm(){
        if(window.XMLHttpRequest){
                xmlhttp = new XMLHttpRequest();
            }else{
                xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
            }
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState==4 && xmlhttp.status==200){
                    alert(xmlhttp.responseText);
                    navigate_main_content('updateUserDetails.php');
                }
            }
            var query = "userId="+ document.getElementById('userLeaveUpdateFormUserId').value + "&leaveType="+ document.getElementById('userLeaveUpdateFormLeaveType').value + "&newValue="+ document.getElementById('userLeaveUpdateFormNewValue').value;
            xmlhttp.open('GET', 'userLeaveUpdate.php?'+query, true);
            xmlhttp.send();
    }

    function commute_leave(leaveDetailId,duration,leaveStatus){
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
        xmlhttp.open('GET', 'commuteLeave.php?leaveDetailId='+leaveDetailId+'&duration='+duration+'&leavestatus='+leaveStatus, true);
        xmlhttp.send();          
    }

    function sendLeave(LeaveType, LeaveDetailId){
        var comment = document.getElementById('comment').value;
        if(LeaveType=='recommendApplication')
            recommendApplication(LeaveDetailId,comment);
        else if(LeaveType=='approveApplication')
            approveApplication(LeaveDetailId,comment);
        else if(LeaveType=='rejectApplication')
            rejectApplication(LeaveDetailId,comment);
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
                navigate_box('outbox');
            }
        }
        xmlhttp.open('GET', 'deleteApplication.php?allLeaves='+JSON.stringify(allLeaves)+'&allLeavesCount='+allLeaves.length, true);
        xmlhttp.send();              
    }
    </script>
    
    <div class="footer l-box is-center">
        Made by IIT Indore CS-208 Group 1 (2014) | Aayushi Malviya | Sayalee Bhanavase | Sriram Ravindran | Rajkumar Passedulla
    </div>

</body>

