<!-------------------------------------- 
CSCI 466: Web-based Store
Group 13: Aaron, Jessie, Cesar, Seth
File: details.php

File Information: 
    This file shows information about
    a specific product in the store.
    The user can add an item to their
    cart from this page.
--------------------------------------->

<html>
<center>
    <head>
        <title>Detail Page</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    </head>

    <form action=inventory.php method=POST>
        <input type=submit value="Back to Store" Details>
    </form>
<?php
    include('backend.php');
    include('functions.php');

    $product_id = implode("", array_keys($_POST));
    $rs = $pdo->prepare("SELECT * FROM Products WHERE product_id=?;");
    $result = $rs->execute(array($product_id));
    $product = $rs->fetchAll(PDO::FETCH_ASSOC)[0];

    echo "<div>";
        setPicture($product['name']);
        echo "<br>";
        echo "<br><h2>" . $product['name'] . ":</h2><br>";
        setDescription($product['name']);
        echo "<br><br>";
        echo "Price: $" . $product['price'] . "<br>";
        echo "Amount Available: " . $product['stock'] . "<br>";
    echo "</div>";

    if($product['stock'] == 0)
    {
        echo "<form action=\"cart.php\" method = \"POST\">";
            echo "<input disabled type=\"number\" placeholder=\"Qty\" min=\"0\" max=\"" . $product['stock'] . "\">";
            echo "<input disabled type=\"submit\" value=\"Add to Cart\">";
        echo "</form>";
    }
    else 
    {
        echo "<form action=\"details.php\" method = \"POST\">";
        echo "<input type=\"number\" name=quantity placeholder=\"Qty\" min=\"0\" max=\"" . $product['stock'] . "\">";
        echo "<input type=\"hidden\" name=\"product_id\" value=\"" . $product['product_id'] . "\">";
        echo "<input type=\"hidden\" name=\"price\" value=\"" . $product['price'] . "\">";
        echo "<input type=\"submit\" value=\"Add to Cart\">";
        echo "</form>"; 
    }

    if (isset($_POST['quantity']) && isset($_POST['product_id']) && isset($_POST['price']))
    {
        $cost = $_POST['quantity'] * $_POST['price'];

        // Add product to cart!
        echo "Added to cart.";
        $query = $pdo->prepare("INSERT INTO CartItems VALUES('$_SESSION[user_name]', '$_POST[product_id]', '$_POST[quantity]', '$cost')");
        $query->execute();
        header("Location: inventory.php");
        exit();
    }
?>
</center>
</html>
