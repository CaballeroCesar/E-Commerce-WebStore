<!-------------------------------------- 
CSCI 466: Web-based Store
Group 13: Aaron, Jessie, Cesar, Seth
File: checkout.php
File Information: 
    This file presents a form for the
    user to fill out so that the user
    can checkout an order.
--------------------------------------->
<html>
    <head>
        <title>Inventory Page</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    </head>
<h1>1. Review Your Order</h1>

<?php
    include('functions.php');
    include('backend.php');

    // Checkout form to take user to checkout page.  This page should make all cartitems into order items, then remove all cart items.
    // an order should be created that links all the order items together.
    $result = $pdo->query("SELECT * FROM CartItems WHERE username = '$_SESSION[user_name]'");
    $cartitems = $result->fetchAll(PDO::FETCH_ASSOC);

    if (count($cartitems) == 0)
    {
        echo "<center><h1>Cart is empty...</h1></center>";
        exit();
    }

    $query = $pdo->prepare("SELECT * FROM Products WHERE product_id = ?");
    $order_cost = 0;

    foreach($cartitems as $row)
    {
        $product_id = $row['product_id'];
        $query->execute([$product_id]);
        $product = $query->fetchAll(PDO::FETCH_ASSOC)[0];
        $order_cost += $row['cost'];
        echo "<div>";
        setPicture($product['name']);
        echo "<h2>" . $product['name'] . "</h2>";
        echo "Amount in Cart: " . $row['quantity'] . "<br>";
        echo "Total Cost: $" . $row['cost'] . "<br><br>";
        echo "</div>";
    }

    echo "<h2>Total Cost: $$order_cost</h2>";
?>
<form action=cart.php method=POST>
    <input type=submit value="Back to Cart" Details>
</form>

<form action=checkout.php method=POST>
<h1> 2. Add payment information</h1>
    <label for=address>Credit Card Number</label><br>
    <input type=text pattern="\d{12, 12}" placeholder="123456789101" name=cardnumber>

<h1> 3. Add shipping information</h1>
    <label for=address>Street Address</label><br>
    <input type=text name=address style="width: 100%" placeholder="75680 Jennyfer Light, Suite 617, 99895-6251, New Ayanafurt, West Virginia"><br>
    <input type=submit name=submit value="Place Order" Details><br>
    <input type=hidden name=total_cost value=<?php echo $order_cost; ?>>

</form>

<?php
    if (isset($_POST['submit']))
    {
        // make order in order_db
        $result = $pdo->query("SELECT count(*) FROM Orders");
        $order_id = $result->fetchAll(PDO::FETCH_ASSOC)[0]['count(*)'];
        $order_id++;

        $query = $pdo->prepare("INSERT into Orders VALUES (?, ?, ?, ?, ?, ?, ?)");
        $query->execute([$order_id, $_SESSION['user_name'], date("Y-m-d H:m:s.000000"), $_POST['address'], $_POST['total_cost'], $_POST['cardnumber'], 0]);

        $result = $pdo->query("SELECT * FROM CartItems WHERE username = '$_SESSION[user_name]'");
        $cart_items = $result->fetchAll(PDO::FETCH_ASSOC);

        $copy_item = $pdo->prepare("INSERT into OrderItems VALUES (?, ?, ?, ?, ?)");

        foreach($cart_items as $product)
        {
            $copy_item->execute([$_SESSION['user_name'], $product['product_id'], $order_id, $product['quantity'], $product['cost']]);
            $update_stock = $pdo->query("UPDATE Products SET stock=stock-$product[quantity] WHERE product_id = $product[product_id]");
        }

        $result = $pdo->query("DELETE FROM CartItems WHERE username = '$_SESSION[user_name]'");
        header("Location: inventory.php");
    }
?>

</html>
