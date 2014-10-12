<?php
session_start();
session_unset();
session_destroy();
unset($_SESSION['logat']);
?>
<html>
<head>
<title>
Logout - SanPRO Infosys.
</title>
<script src="pace.js"></script>
<link href="dataurl.css" rel="stylesheet" />
<link rel="stylesheet" href="style.css" />
</head>
<body bgcolor="BLACK" background="bg.jpg">
<div align="center" color="#FFFFFF"><h1>SanPRO Infosys.</h1></div>
<br><b>Logcat:</b><br/>
user@sanpro:execute log.pl action="logout" -lvvp 4421<br/>
SanPRO Infosys &copy 2014<br/>
Checking Parameters...<br/>
User logged in via Level 3 Authenication<br/>
Nullifying Login data<br/>
User has been logged out of system.<br/>
</body>
</html>