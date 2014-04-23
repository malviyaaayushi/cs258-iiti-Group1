<?php    
    $user = new user();
    $loggedIn = false;
    if($user->is_logged_in()){
        $loggedIn = true;   
    }else{
        redirect::to('login.php');
    }

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Administration Portal | IIT Indore</title>
    <link rel = "stylesheet" type = "text/css" href = "pure-master/src/forms/css/forms.css">
    <link rel = "stylesheet" type = "text/css" href = "pure-master/src/buttons/css/buttons.css">
    <link rel = "stylesheet" type = "text/css" href = "pure-master/src/tables/css/tables.css">
    <link rel = "stylesheet" type = "text/css" href = "pure-master/src/menus/css/menus.css">
    <link rel = "stylesheet" type = "text/css" href = "pure-master/src/base/css/base.css">
	<link rel="stylesheet" type="text/css" href="stylesheets/main.css">
    <!--[if gt IE 8]><!-->
        <link type="text/css" rel="stylesheet" href="/css/layouts/marketing.css">
        <link type="text/css" rel="stylesheet" href="/css/layouts/side-menu.css">
    <!--<![endif]-->
</head>
      
    <!--[if lt IE 9]>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
    <![endif]-->
    
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-41480445-1', 'purecss.io');
ga('send', 'pageview');
</script>
<style>
#ribbon{
    padding-top:58px;
}
</style>
<body>
	<div id = "header">
    	<a class = 'headerLink' href = "#" style="float:left;" title = 'Go to IITI Home Page'>ONLINE ADMINISTRATION PORTAL</a>
        <div id = "links">
            <?php if($loggedIn)echo "<a href = 'logout.php' class='headerLink' id = 'logout'>Logout</a>";?>
            <a> <?php echo "<a class='headerLink' >" . $user->data()->name . "</a>";?> 
        </div>
    </div>
    <div class='.clearFloat'></div>
    