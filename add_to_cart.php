<?php
session_start(); 
include('database.php');

$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];
$user_id = $_SESSION['user_id'];


// Check if the product already exists in the cart for the current user
$existing_product_query = "SELECT * FROM cart WHERE user_id = '$user_id' AND product_id = '$product_id'";
$existing_product_result = $conn->query($existing_product_query);

if ($existing_product_result->num_rows > 0) {
  $update_query = "UPDATE cart SET quantity = quantity + '$quantity' WHERE user_id = '$user_id' AND product_id = '$product_id'";
  if ($conn->query($update_query) === TRUE) {
    echo "Quantity updated successfully!";
  } else {
    echo "Error updating quantity: " . $conn->error;
  }
} 

else {
  $insert_query = "INSERT INTO cart (user_id, product_id, quantity) VALUES ('$user_id', '$product_id', '$quantity')";
  if ($conn->query($insert_query) === TRUE) {
    echo "Product added to cart successfully!";
  } else {
    echo "Error adding product to cart: " . $conn->error;
  }
}

$conn->close();
?> 