<!-------------------------------------- 
CSCI 466: Web-based Store
Group 13: Aaron, Jessie, Cesar, Seth
File: logout.php

File Information: 
    Logs out a user from the system.
--------------------------------------->
<html>

<head>
</head>

<body>
    <h1>Logged Out.</h1>
</body>

<?php 
    session_start();
    session_unset();
    session_destroy();
    header("Location: login.php");
?>

</html>
