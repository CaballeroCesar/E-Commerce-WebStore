<?php
    /************************** 
     * SECRETS FILE FORMAT
     * $username = '';
     * $password = '';
     *************************/
    session_start();
    include('/home/data/www/z1944013/public_html/secrets.php');
    try 
    {
        //Connect to database
        $dsn = "mysql:host=courses;dbname=$username"; 
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOexception $e)
    {
        echo "Connection to database failed: " . $e->getmessage();
    }
?>

