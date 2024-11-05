<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>E-commerce Website</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@1,200&family=Poppins:ital,wght@0,400;1,200;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="header">
        <div class="navbar">
            <div class="logo">
                <img src="images/Logo.png" width="100px">
            </div>
            <div class="search">
                <form action="/search" method="GET">
                    <input type="text" placeholder="Search..." name="q">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <nav >
                <ul>
                    <li><a href="main.php">HOME</a></li>
                    <li><a href="cart.php">CART</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    <li class="dropdown">
                        <a class="dropbtn">PRODUCTS</a>
                        <div class="dropdown-content">
                        <a href="Kajal.php">Kajal</a>
                                <a href="Eyeliner.php">Eyeliner</a>
                                <a href="Eyeshadow.php">Eyeshadow</a>
                                <a href="Eyebrow.php">Eyebrow</a>
                                <a href="Mascara.php">Mascara</a>
                                <a href="Foundation.php">Foundation</a>
                                <a href="Concealer.php">Concealer</a>
                                <a href="FaceP.php">Face Powder</a>
                                <a href="Blush.php">Blush</a>
                                <a href="Highlighter.php">Highlighter</a>
                                <a href="Bronzer.php">Bronzer</a>
                                <a href="Contour.php">Contour</a>
                                <a href="Primer.php">Primer</a>
                                <a href="Lipstick.php">Lipstick</a>
                                <a href="LipG.php">Lip Gloss</a>
                                <a href="LipB.php">Lip Balm</a>
                                <a href="Moisturizer.php">Moisturizer</a>
                                <a href="Sunscreen.php">Sunscreen</a>
                                <a href="FaceW.php">Face Wash</a>
                                <a href="Cleanser.php">Cleanser</a>

                        </div>
                    </li>
                    <li><a href="account.php">ACCOUNT</a></li>
                </ul>
            </nav>
    </div>
</div>
<div class="categories">
<div class="col-1">

<?php
session_start(); // Start the session
include('database.php'); // Include the database connection

// Retrieve the cart data from the database
$user_id = $_SESSION['user_id'];
$sql = "SELECT cart.*, products.name, products.price, products.image FROM cart INNER JOIN products ON cart.product_id = products.product_id WHERE cart.user_id = '$user_id'";
$result = $conn->query($sql);

// Check if there are items in the cart
if ($result->num_rows > 0) {
    echo "<form action='u_c.php' method='POST'>"; // Start the update form

    // Display the cart items
    while ($row = $result->fetch_assoc()) {
        $product_id = $row['product_id'];
        $product_name = $row['name'];
        $product_price = $row['price'];
        $product_image = $row['image'];
        $quantity = $row['quantity'];
        $subtotal = $product_price * $quantity;

        // Display the cart item with a quantity input
        echo "<div class='cart-item'>";
        echo "<img src='$product_image' alt='$product_name' width='200' height='200'>";
        echo "<h3>$product_name</h3>";
        echo "<p>Price: $product_price</p>";
        echo "<p>Quantity: <input type='number' name='quantity[$product_id]' value='$quantity' min='1'></p>";
        echo "<p>Subtotal: $subtotal</p>";
        echo "</div>";
    }

    // Calculate the total
    $sql = "SELECT SUM(products.price * cart.quantity) AS total FROM cart INNER JOIN products ON cart.product_id = products.product_id WHERE cart.user_id = '$user_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $total = $row['total'];

    // Display the total and update/clear buttons
    echo "<div class='cart-total'>";
    echo "Total: $total";
    echo "</div>";
    echo "<button type='submit'>Update Cart</button>"; // Update cart button

    echo "</form>"; // End the update form

    // Clear cart button
    echo "<form action='clear_cart.php' method='POST'>";
    echo "<button type='submit' class='btn'>Clear Cart</button>";
    echo "</form>";

    echo "<a href='checkout.php'>Proceed to Checkout</a><br>";
    echo "<a href='main.php'>Go to Home</a><br>";
    echo "</div>";

} else {
    // Display a message if the cart is empty
    echo "Your cart is empty.";
}

// Close the database connection
$conn->close();
?>

</div>
</div>
</body>
</html>