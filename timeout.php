<?php
session_start();
session_unset();
session_destroy();
unset($_SESSION['logat']);
?>
<html>
<head>
<title>
SanPRO Infosys.
</title>
</head>
<body>
<div align="center">
<h1>Your Login Session Expired!</h1>
Your login session is either invalid or you took too long to respond.<br>
Also, your IP address<?php $ip=$_SERVER['REMOTE_ADDR'];
echo "<b>($ip)</b>";
$filename = "iplist.txt";
$string = "\nSuspicious entry detected from ";
$string .= $ip;
$fp = fopen($filename, 'w');
fwrite($fp, $string);
fclose($fp);
?> has been logged for security concerns.<br>In case you are identified suspicious, necessary actions will be taken.
</div>
</body>
</html>