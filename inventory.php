<!-------------------------------------- 
CSCI 466: Web-based Store
Group 13: Aaron, Jessie, Cesar, Seth
File: inventory.php

File Information: 
    Displays the inventory from the db
    in a webpage.  Each items quantity
    and cost are displayed here.

--------------------------------------->

<html>
<center>
    <head>
        <title>Inventory Page</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    </head>

    <h1>Web Based Store</h1>

    <table style="width:60%">
        <tr>
            <td>
                <form action=cart.php method=POST>
                    <input type=submit value="View Cart" Details>
                </form>
            </td>
            <td>
                <form action=orders.php method=POST>
                    <input type=submit value="My Orders" Details>
                </form>
            </td>
            <td>
                <form action=logout.php method=POST>
                    <input type=submit value="Logout" Details>
                </form>
            </td>
        </tr>

    </table>
<?php
    include('functions.php');
    include('backend.php');
    
    //Retrieve all data inside Products table in database
    $rs = $pdo->query("SELECT * FROM Products;");
    $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
    
    //loop to print out name, price, and quantity in stock of product from database
    echo "<hr>";
    foreach($rows as $row)
    {
        $product_id = $row['product_id'];
        echo "<div>";
            setPicture($row['name']);
            echo "<br><h2>" . $row['name'] . "</h2><br>";
            echo "Price: $" . $row['price'] . "<br>";
            echo "Amount Available: " . $row['stock'] . "<br><br>";

            echo "<form action=\"details.php\" method = \"POST\">";
            echo "<input type=\"submit\" name=\"$product_id\" value=\"View Details\">";
            echo "</form>";
            
        echo "</div>";
        echo "<hr>";
    }
?>
</center>
</html>
