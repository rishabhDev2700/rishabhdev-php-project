<?php
include('../includes/config.php');
include('../user-auth/auth.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["register"])) {
    $username = htmlspecialchars($_POST["username"]);
    $password = $_POST["password"]; // Use password_hash() to securely hash the password
    $email = htmlspecialchars($_POST["email"]);
    if (register_user($username, $password, $email)) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error registering user.";
    }
}
?>

<!-- Registration form -->
<form method="post" action="">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <input type="submit" name="register" value="Register">
</form>
