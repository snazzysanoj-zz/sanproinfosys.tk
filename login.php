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
header("Location: http://sanproinfosys.tk/header.html");
} else {
echo '<html><head><script src="pace.js"></script>
  <link href="dataurl.css" rel="stylesheet" /><meta http-equiv="refresh" content="20;URL=http://sanproinfosys.tk/timeout.php">';
echo '<title>SanPRO Infosys</title><link rel="stylesheet" href="style.css">';
echo '<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script></head><body bgcolor="BLACK" background="bg.jpg">';
echo '<form id="login" method="post" action="login.php" class="login"><p><label for="login">ID:</label>';
echo '<input type="hidden" name="ac" value="log">';
echo '<input type="text" name="username" id="username" value="" autofocus required></p><p><label for="password">Key:</label>';
echo '<input type="password" name="password" id="password" value="" required></p><p class="login-submit">';
echo '<button type="submit" id="submit" name="submit" class="login-button">Login</button></p></form>';
echo '<div align="center"><a href="http://ssc.sanproinfosys.tk">SSC</a></div></body></html>';
};
?>