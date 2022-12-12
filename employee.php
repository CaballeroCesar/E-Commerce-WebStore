<!-------------------------------------- 
CSCI 466: Web-based Store
Group 13: Aaron, Jessie, Cesar, Seth
File: employee.php

File Information: 
    This file shows a record of all
    pending orders.

--------------------------------------->

<html>
<center>
    <head>
        <title>Orders Page</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    </head>

    <h1>Pending Orders</h1>

    <table style="width:50%">
        <tr>
            <td>
                <form action=logout.php method=POST>
                    <input type=submit value="Logout" Details>
                </form>
            </td>
            <td>
                <form action=allOrders.php method=POST>
                    <input type=submit value="All Orders" Details>
                </form>
            </td>
        </tr>

    </table>
</center>

<?php
    include('functions.php');
    include('backend.php');

    // BLOCK FOR FULFILLING AN ORDER GOES HERE
    if (isset($_POST['order_id']))
    {
        $result = $pdo->query("UPDATE Orders SET status = '1' WHERE order_id = '$_POST[order_id]'");
    }

    $result = $pdo->query("SELECT * FROM Orders WHERE status = '0'");
    $orders = $result->fetchAll(PDO::FETCH_ASSOC);

    if (count($orders) == 0)
    {
        echo "<center><h1>All orders have been shipped!</h1></center>";
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
