<!-------------------------------------- 
CSCI 466: Web-based Store
Group 13: Aaron, Jessie, Cesar, Seth
File: allOrders.php

File Information: 
    This file shows all of the orders
    for an employee's record.

--------------------------------------->

<html>
<center>
    <head>
        <title>Orders Page</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    </head>

    <h1>All Orders</h1>

    <table style="width:50%">
        <tr>
            <td>
                <form action=logout.php method=POST>
                    <input type=submit value="Logout" Details>
                </form>
            </td>
            <td>
                <form action=employee.php method=POST>
                    <input type=submit value="Pending Orders" Details>
                </form>
            </td>
        </tr>

    </table>
</center>

<?php
    include('functions.php');
    include('backend.php');

    $result = $pdo->query("SELECT * FROM Orders");
    $orders = $result->fetchAll(PDO::FETCH_ASSOC);

    if (count($orders) == 0)
    {
        echo "<center><h1>There are no more orders...</h1></center>";
        exit();
    }

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

            echo "Customer: &nbsp&nbsp&nbsp" . $row['username'] . "<br>";

            echo "Tracking #:&nbsp&nbsp " . $row['order_id'] . "<br>";

            echo "Order Total:&nbsp $" . $row['total_cost'] . "<br>";

            echo "<form action=orderDetails.php method=POST>";
                echo "<input type=submit name=\"$order_id\" value=\"Order Details\" Details>";
            echo "</form>";

            echo "<hr>";
        echo "</div>";
    }

?>
</html>
