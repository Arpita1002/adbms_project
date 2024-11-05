<?php
session_start(); // Start the session
include('database.php'); // Include the database connection

// Get the user ID from the session
$user_id = $_SESSION['user_id'];

// Loop through posted quantities and update each item in the cart
foreach ($_POST['quantity'] as $product_id => $quantity) {
    // Ensure quantity is a positive integer
    $quantity = max(1, (int)$quantity);
    $sql = "UPDATE cart SET quantity = '$quantity' WHERE user_id = '$user_id' AND product_id = '$product_id'";

    if (!$conn->query($sql)) {
        echo "Error updating cart item: " . $conn->error;
    }
}

header("Location: cart.php"); // Redirect back to the cart page

// Close the database connection
$conn->close();
?>
