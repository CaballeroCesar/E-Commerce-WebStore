<!-------------------------------------- 
CSCI 466: Web-based Store
Group 13: Aaron, Jessie, Cesar, Seth
File: orderDetails.php

File Information: 
    This file contains data about an order.
    It will show the contents of the order,
    and other details stored in the db.
    An employee can ship the order if they
    are logged in.

--------------------------------------->

<html>
<center>
    <head>
        <title>Order Detail Page</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    </head>

    <h1>Order Details</h1>
</center>

<?php
    include('functions.php');
    include('backend.php');

    $order_id = implode("", array_keys($_POST));//store order number in variable

    //$result = $pdo->query("SELECT * FROM OrderItems WHERE order_id = $order_id");
    $result = $pdo->query("SELECT Products.name, OrderItems.quantity, OrderItems.cost FROM Products INNER JOIN OrderItems WHERE OrderItems.order_id = $order_id AND OrderItems.product_id=Products.product_id;");
    $orderDetails = $result->fetchAll(PDO::FETCH_ASSOC);
    $result = $pdo->query("SELECT * FROM Orders WHERE order_id = '$order_id'");
    $shippingDetails = $result->fetchAll(PDO::FETCH_ASSOC)[0];
    $result = $pdo->query("SELECT * FROM Customers WHERE username = '$shippingDetails[username]'");
    $userDetails = $result->fetchAll(PDO::FETCH_ASSOC)[0];

    if ($_SESSION['user_type'] == 'employee')
    {
        echo "<center>";
            echo "<form action=employee.php method=POST>";
                echo "<input type=submit value=\"Back to Orders\" Details>";
            echo "</form>";
        echo "</center>";

        echo "<h2>Shipping Information</h2>";
        echo "Customer: " . $userDetails['name'] . "<br>";
        echo "Email: " . $userDetails['email'] . "<br>";
        echo "Shipping address: " . $shippingDetails['address'] . "<br>";
        echo "Date of Purchase: " . $shippingDetails['time'] . "<br>";
        echo "Total Cost: $" . $shippingDetails['total_cost'] . "<br>";

    } 
    else 
    {
        echo "<center>";
        echo "<form action=orders.php method=POST>";
            echo "<input type=submit value=\"Back to Orders\" Details>";
        echo "</form>";
        echo "</center>";
    }


    echo "<h2>Contents of Order #: " . $order_id . "</h2>";
    echo "<hr>";
    foreach($orderDetails as $row)
    {

        echo "Product in Order: " . $row['name'] . "<br>";
        echo "Quantity Ordered: " . $row['quantity'] . "<br>";
        echo "Cost: $" . $row['cost'] . "<br>";
        setPicture($row['name']);
        echo "<hr>";
    }

    if ($_SESSION['user_type'] == 'employee' && $shippingDetails['status'] == 0)
    {
        echo "<center>";
            echo "<form action=employee.php method=POST>";
                echo "<input type=hidden name=\"order_id\" value=$order_id>";
                echo "<input type=submit value=\"Ship Order\" Details>";
            echo "</form>";
        echo "</center>";
    }
   
?>
</html>
