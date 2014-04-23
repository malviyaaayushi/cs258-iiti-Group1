<?php
require 'core/init.php';
echo session::flash('home');
    
$debarr = false;
if(input::exists()){
    if(token::check(input::get('token'))){
        $validate = new validate();
        $validation = $validate->check($_POST, array(
                             'username' => array('required'=> true),
                             'password' => array('required' => true)
                        ));
        if($validation->get_passed()){
            $user = new user();        
            $login = $user->login(input::get('username'), input::get('password'));
            if($login){
                redirect::to('applicationsBox.php');
            }else{
                $debarr = true;
            }
        }
        else{
            foreach ($validation->get_errors() as $error) {
                echo $error . "<br/>";
            }
        }
    }
}
else{
    $user = new user();
    if($user->is_logged_in())redirect::to('applicationsBox.php');
    unset($user);
}

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Title</title>
	<link rel="stylesheet" type="text/css" href="stylesheets/main.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/login.css">
</head>
<body style = 'background-image:url("background.jpg");'>
    <div style="width:100%;height:10%;background-color:black;color-white;padding:0;margin:0;align:center;">
        <div style="vertical-align:center;line-height:3;width:40%;margin:0 38%;">
            <h1 style="color:white;horizontal-align:center;">Online Administration Portal</h1>
        </div>
    </div>
    <div id = 'loginBox'>
        <form class = 'loginForm' action = '' method = 'POST'>
            <p class = 'float'>
                <input type = 'text' name = 'username' placeholder = 'Username'>
            </p>
            <p class = 'float'>
                <input type = 'password' name = 'password' placeholder = 'Password'>
            </p>
            <p><label id = 'loginFault'><?php
                if($debarr) echo "*Login failed. Please try again.";
                ?></label>
            </p>
            <p class = 'clearfix'> 
                <input type = 'hidden' name = 'token' value = '<?php echo token::generate();?>'>
                <input type = 'submit' name = 'submit' value = 'Login'>
            </p>
        </form>
    </div>
</body>
</html>
