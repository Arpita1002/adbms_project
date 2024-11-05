<?php
session_start(); // Start the session
include('database.php'); // Include the database connection

// Get the user ID from the session
$user_id = $_SESSION['user_id'];

// Delete all items from the cart for this user
$sql = "DELETE FROM cart WHERE user_id = '$user_id'";

if ($conn->query($sql) === TRUE) {
    echo "Cart cleared successfully.";
    header("Location: cart.php"); // Redirect to the cart page
} else {
    echo "Error clearing cart: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
