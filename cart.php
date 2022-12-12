<!-------------------------------------- 
CSCI 466: Web-based Store
Group 13: Aaron, Jessie, Cesar, Seth
File: cart.php

File Information: 
    This file displays the cartItems
    for a logged-in user.

--------------------------------------->
<html>

    <head>
        <title>Shopping Cart Page</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    </head>

<center>
<form action=inventory.php method=POST>
    <input type=submit value="Back to Store" Details>
</form>
</center>

<?php

    include('functions.php');
    include('backend.php');
    
    //Retrieve all data inside Products table in database
    $result = $pdo->query("SELECT * FROM CartItems WHERE username = '$_SESSION[user_name]'");
    $cartitems = $result->fetchAll(PDO::FETCH_ASSOC);

    if (count($cartitems) == 0)
    {
        echo "<center><h1>Cart is empty...</h1></center>";
        exit();
    }

    $query = $pdo->prepare("SELECT * FROM Products WHERE product_id = ?");
?>

<table>

<?php
    foreach($cartitems as $row)
    {
        $product_id = $row['product_id'];
        $query->execute([$product_id]);
        $product = $query->fetchAll(PDO::FETCH_ASSOC)[0];
        echo "<tr style=\"height:100px\">";
        echo "<td>";
        echo "<div>";
            setPicture($product['name']);
            echo "<h2>" . $product['name'] . "</h2>";
            echo "Amount in Cart: " . $row['quantity'] . "<br>";
            echo "Total Cost: $" . $row['cost'] . "<br>";

        // Checkout form to take user to checkout page.  This page should make all cartitems into order items, then remove all cart items.
        // an order should be created that links all the order items together.
        echo "</div>";
        echo "<hr>";
        echo "</td>";

        echo "<td><br><br><br><br>";
        echo "<form action=cart.php method=POST>";
        echo "<input type=submit name=\"update\" value=\"Update Quantity\">";
        echo "<input type=\"hidden\" name=\"product_id\" value=\"" . $product['product_id'] . "\">";
        echo "<input type=\"hidden\" name=\"price\" value=\"" . $product['price'] . "\">";
        echo "<input type=\"number\" name=quantity value=$row[quantity] placeholder=\"Qty\" min=\"1\" max=\"" . $product['stock'] . "\">";
        echo "</form>";
        echo "</td>";

        echo "<td><br><br><br><br>";
        echo "<form action=cart.php method=POST>";
        echo "<input type=\"hidden\" name=\"product_id\" value=\"" . $product['product_id'] . "\">";
        echo "<input type=submit name=\"remove\" value=\"Remove Item\">";
        echo "</form>";
        echo "</td>";

        echo "</tr>";
    }
?>

</table>

<center>
<form action=checkout.php method = POST>
    </br><input type=submit name=Checkout value=Checkout Details>
</form>
</center>

<?php
    if (isset($_POST['update']))
    {
        $cost = $_POST['quantity'] * $_POST['price'];
        $result = $pdo->query("UPDATE CartItems SET quantity=$_POST[quantity], cost=$cost WHERE username = '$_SESSION[user_name]' AND product_id = '$_POST[product_id]'");
        echo "<meta http-equiv='refresh' content='0'>";
    }
    else if (isset($_POST['remove']))
    {
        $result = $pdo->query("DELETE FROM CartItems WHERE username = '$_SESSION[user_name]' AND product_id = '$_POST[product_id]'");
        echo "<meta http-equiv='refresh' content='0'>";
    }
?>

</html>
