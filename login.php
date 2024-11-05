<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Login</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@1,200&family=Poppins:ital,wght@0,400;1,200;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="login-container">
    <h2>Login</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <span class="error-message"><?php if(isset($emailErr)) { echo $emailErr; } ?></span><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <span class="error-message"><?php if(isset($passwordErr)) { echo $passwordErr; } ?></span><br>

        <button type="submit">Login</button>
    </form>

    <p>Not registered? <a href="register.php">Register here</a>.</p>
    </div>
</body>



<?php
include('database.php'); // Include your database connection file

session_start(); // Start session to store user information

$emailErr = "";
$passwordErr = "";

// Login processing
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email)) {
        $emailErr = "Email is required.";}

    if(empty($password)){
        $passwordErr = "Password is required.";
    } else{
        // Check if the email exists
        $checkEmail = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($checkEmail);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
                header("Location: main.php"); // Redirect to the home page after login
                exit();
            } else {
                $passwordErr = "Invalid password.";
            }
        } else {
            $emailErr = "Email not found.";
        }
    }
}
?>
</html>


