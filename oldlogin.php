<?php
session_start();
include("userdb.php");
if ($_POST["ac"]=="log") {
     if ($USERS[$_POST["username"]]==$_POST["password"]) {  
          $_SESSION["logged"]=$_POST["username"];
     } else {
          header("Location: http://sanproinfosys.tk/Error/401.html");
     };
};
if (array_key_exists($_SESSION["logged"],$USERS)) {
     echo "You are already logged into SanPRO Infosys";
header("Location: http://sanproinfosys.tk/header.html");
} else { 
echo '<html><head>';
echo '<meta http-equiv="refresh" content="20;URL=http://sanproinfosys.tk/timeout.php">';
echo '<title>Login to SanPRO Server</title>';
echo '<script src="warn.vbs"></script>';
echo '<link rel=Stylesheet href="def_theme.css" type="text/css" />'; 
echo '</script></head><body onload="spkk()">';
echo '<form id="login" action="login.php" method="post"><input type="hidden" name="ac" value="log"> <h1>Log In</h1><fieldset id="inputs">';
     echo '<input id="username" placeholder="Username" type="text" name="username" autofocus required >';
     echo '<input id="password" type="password" name="password" placeholder="Password" required/></fieldset>';
     echo '<fieldset id="actions"><input type="submit" id="submit" value="Log in" /></fieldset>';
     echo '</form></body></html>';
};
?>