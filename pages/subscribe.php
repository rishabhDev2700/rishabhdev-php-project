<?php
include("../includes/config.php");
include("../includes/functions.php");
include("../templates/header.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = htmlspecialchars($_POST["email"]);
    if (save_subscription_email($email)) {
        echo "Subscribed successfully!";
    } else {
        echo "Error subscribing to the newsletter.";
    }
}
?>
<form class="container bg-white py-5 p-4 w-50 text-center" method="post" action="">
    <h1 class="heading text-center mb-5">Submit Your Email to Subscribe to my newsletter</h1>
    <input type="text" class="form-control p-2 m-3" id="Email" placeholder="email@example.com" name="email">
    <input class="btn btn-primary px-5 py-3" type="submit" value="Subscribe">
</form>