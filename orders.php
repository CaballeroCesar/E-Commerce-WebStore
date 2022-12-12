<!-------------------------------------- 
CSCI 466: Web-based Store
Group 13: Aaron, Jessie, Cesar, Seth
File: orders.php

File Information: 
    Displays all of a users orders,
    with some details and a details
    button.

--------------------------------------->

<html>
<center>
    <head>
        <title>Orders Page</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    </head>

    <h1>My Orders</h1>

    <form action=inventory.php method=POST>
        <input type=submit value="Back to Store" Details>
    </form>
</center>
<?php
    include('functions.php');
    include('backend.php');

    $result = $pdo->query("SELECT * FROM Orders WHERE username = '$_SESSION[user_name]'");
    $orders = $result->fetchAll(PDO::FETCH_ASSOC);

    if (count($orders) == 0)
    {
        echo "<center><h1>There are no Orders ...</h1></center>";
        exit();
    }
    echo "<hr>";
    
    $totalAmountAll = 0;
    foreach($orders as $row)
    {
        $order_id = $row['order_id'];
        echo "<div>";
            echo "Order #:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp " . $row['order_id'] . "<br>";

            echo "Order Date:&nbsp " . $row['time'] . "<br>";
            
            echo "Status:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ";
            if($row['status'] == 0)
            {
                echo "Processing...";
            }
            elseif($row['status'] == 1)
            {
                echo "Shipped!";
            }
            else echo "Unknown";
            echo "<br>";

            echo "Tracking #:&nbsp&nbsp " . $row['order_id'] . "<br>";

            echo "Order Total:&nbsp $" . $row['total_cost'] . "<br>";

            echo "<form action=orderDetails.php method=POST>";
                echo "<input type=submit name=\"$order_id\" value=\"Order Details\" Details>";
            echo "</form>";

            echo "<hr>";
        echo "</div>";
        $totalAmountAll +=  $row['total_cost'];
    }
    echo "<center>";
        echo "<h3>Total for all Orders: $" . $totalAmountAll . "</h3>";
    echo "</center>";
?>
</html>

