<?php
include("../templates/author-header.php");
session_destroy();
header("Location: login.php");
exit();
?>