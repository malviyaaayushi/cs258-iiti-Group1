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
        top:47px;         
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
        background: #c0392b;
        color: #aaa;
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
</style>

<div id="navigation">
        <style type="text/css">
            .ul-nav{                
                background:rgba(0,0,0, 0.7);
                font-weight: 600;
                padding:10px;
            }   
            .ul-nav li a{
                border-radius: 2px;
                line-height: 2.5;
                color: white;
                display:block;
                text-decoration: none;
                padding:0 20px 0 20px;
            }
            .ul-nav li a:hover,
            .ul-nav li a:focus {
                background: rgba(52, 152, 219, 1);
                color:white;
            }
            #ulnav{
                margin-left: 0px;   
                height: 100%;
                padding-top: 48px;
            }
            #ihatethis{
                color:#2c3e50;
                width:200px;
            }
            #ihatethis:hover{
                background-color: #e74c3c;
                color:white;
            }
        </style>
        <ul class="ul-nav" id = 'ulnav'>
            <li>
                <a href="#" class="pure-button pure-button-primary" id = 'ihatethis' style="border-radius:2px;" onclick="compose();">Apply for Leave</a>
            </li>
            <li style="margin-top:20px;">
                <a href="#" onclick="navigate_box('inbox');">Inbox</a>
            </li>
            <li>
                <a href="#" onclick="navigate_box('outbox');">Outbox</a>
            </li>
            <li>
                <a href="#" onclick="navigate_box('trashBox');">Trash Box</a>
            </li>
            <li>
                <a href="#" onclick="navigate('profile.php');">Profile</a>
            </li>
            <li>
                <a href="#" onclick="navigate('servicebook.php');">Service Book</a>
            </li>
            <li>
                <a href="#" onclick="navigate('leaveHistory.php');">Leave Account</a>
            </li>
             <li>
                <a href="#" onclick="navigate('leaveTravelConcession.php');">LTC Record</a>
            </li>
            <li>
                <a href="#" onclick="navigate('LTCDeclaration.php');">LTC Declaration</a>
            </li>
            <li>
                <a href="#" onclick="navigate('serviceRegister.php');">Service Register</a>
            </li>
            <?php 
                if($user->data()->actorrank == 1){
                    echo '<li>
                            <a href = "#" onclick = "navigate(\'adminPanel2.php\');">Admin Panel</a>
                        </li>'; 
                }
            ?>
            <li>
                <a href="#" onclick="navigate('settings.php');">Change Password</a>
            </li>
        </ul>
</div>

<div id = 'pseudoDiv'></div>
<div id = 'container' > 
    <div id="navigation_content">
        <div class="searchBox l-box-lrg pure-g">
            <form class="pure-form" id="search_form" style='display:inline;'>
                <input type="text" id="searchBox" class="pure-form input-rounded" placeholder="Search..." style="width:40%;margin:0;" onkeyup="search(this.value, &quot;inbox&quot;)" ;="">    
            </form>
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

    </script>


</body>

