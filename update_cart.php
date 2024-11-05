<?php
session_start();
include('database.php');

$cart_id = $_POST['cart_id'];
$quantity = $_POST['quantity'];

$update_query = "UPDATE cart SET quantity = '$quantity' WHERE cart_id = '$cart_id'";

if ($conn->query($update_query) === TRUE) {
    echo "Cart updated successfully!";
} else {
    echo "Error updating cart: " . $conn->error;
}

// Close the database connection
$conn->close();
?>