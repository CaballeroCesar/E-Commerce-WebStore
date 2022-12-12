<!-------------------------------------- 
CSCI 466: Web-based Store
Group 13: Aaron, Jessie, Cesar, Seth
File: login.php

File Information: 
    This file acts as a login screen.
    User and employee login Information
    can be found in "populate.sql"

--------------------------------------->
<html>

<head>
    <title>Customer Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>

<body>
     <form action="login.php" method="post">
        <h2>Login</h2>
        <label>User Name</label>
        <input type="text" name="user" placeholder="User Name"><br>
        <label>Password</label>
        <input type="password" name="pwd" placeholder="Password"><br> 
        <button type="submit">Login</button>
        <label>Employee</label>
        <input type="checkbox" name="type"><br>
     </form>
</body>

<?php 
    include "backend.php";

    if (isset($_POST['user']) && isset($_POST['pwd']))
    {
        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $user = validate($_POST['user']);
        $pwd = validate($_POST['pwd']);

        if (empty($user))
        {
            echo "Failed Login!";
            exit();
        }
        else if(empty($pwd))
        {
            echo "Failed Login!";
            exit();
        }
        else
        {
            if ($_POST['type'] == 'on')
            {
                $query = $pdo->prepare("SELECT count(*) FROM Employees WHERE employee_id='$user' AND password='$pwd'");
            }
            else
            {
                $query = $pdo->prepare("SELECT count(*) FROM Customers WHERE username='$user' AND password='$pwd'");
            }

            $query->execute();
            $result = $query->fetch()[0];

            if ($result == 1)
            {
                echo "Logged in!";
                $_SESSION['user_name'] = $user;

                if ($_POST['type'] == 'on')
                {
                    $_SESSION['user_type'] = 'employee';
                    header("Location: employee.php");
                    exit();
                }

                $_SESSION['user_type'] = 'customer';
                header("Location: inventory.php");
                exit();
            }
            else
            {
                echo "Incorrect username or password!";
                session_unset();
                session_destroy();
                exit();
            }
        }
    }
?>
</html>
