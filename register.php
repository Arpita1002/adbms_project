<?php
include('database.php'); // Include your database connection file

session_start(); // Start session to store user information

// Registration processing
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $email = $_POST['email'];

    // Validate fields (add more validation as needed)
    if (empty($username) || empty($password) || empty($confirmPassword) || empty($email)) {
        echo "All fields are required.";
    } elseif ($password !== $confirmPassword) {
        echo "Passwords do not match.";
    } else {
        // Check if the username already exists
        $checkUsername = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($checkUsername);

        if ($result->num_rows > 0) {
            echo "Username already exists. Choose a different username.";
        } else {
            // Insert the new user into the database
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $insertUser = "INSERT INTO users (username, password, email) VALUES ('$username', '$hashedPassword', '$email')";
            if ($conn->query($insertUser) === TRUE) {
                echo "Registration successful. You can now <a href='login.php'>login</a>.";
            } else {
                echo "Error: " . $conn->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@1,200&family=Poppins:ital,wght@0,400;1,200;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="login-container">
    <h2>Register</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <button type="submit">Register</button>
    </form>

    <p>Already registered? <a href="login.php">Login here</a>.</p>
</div>
</body>
</html>
