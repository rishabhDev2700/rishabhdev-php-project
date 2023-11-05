<?php
session_start();
include_once('../includes/config.php');
include_once('form-handlers.php');
include_once('category_form.php');

handle_category_submission();

include '../templates/footer.php';
?>
