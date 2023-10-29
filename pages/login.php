<?php
include('../includes/config.php');
include('../includes/functions.php');
include('../templates/header.php');
include('../user-auth/auth.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["email"])) {
    $username = htmlspecialchars($_POST["email"]);
    $password = $_POST["password"];
    $login_successfully = login_user($username, $password);
    if ($login_successfully) {
        header("Location: /author/create.php");
        exit();
    } else {
        echo "Incorrect username or password.";
    }
}
?>


<div class="d-flex justify-content-around overflow-hidden">
    <img src="../assets/pexels-janson-a-753695.jpg" class="w-50 img-thumbnail">
    <form
        class="container border border-2 py-5 p-4 w-50 bg-dark text-white text-center d-flex flex-column justify-content-center align-items-center" action="login.php" method="post">
        <h1 class="heading text-center my-3">Author Login</h1>
        <input type="text" class="form-control p-2 m-3" placeholder="email@example.com" name="email">
        <input type="password" class="form-control p-2 m-3" placeholder="Password" name="password">
        <input class="btn btn-primary px-5 py-3" type="submit" value="Login">
    </form>
</div>