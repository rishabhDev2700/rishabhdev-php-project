<?php
include '../includes/author_functions.php';

function handle_category_submission()
{
    global $db;

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["name"])) {
        // Validate and sanitize form inputs
        $name = htmlspecialchars($_POST["name"]);
        $description = htmlspecialchars($_POST["description"]);
        if (create_category($name, $description)) {
            header("location: /author/create.php");
            exit();
        } else {
            echo "Error occurred while handling submission";
        }
    }
    
}

function handle_article_submission()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["category"])) {
        $title = htmlspecialchars($_POST["title"]);
        $content = $_POST["content"];
        $author = intval($_SESSION['user_id']);
        $category_id = intval($_POST["category"]);

        if (create_blog_post($title, $content, $author, $category_id)) {
            echo "Article Published";
            header("Location: /author/create.php");
            exit();
        } else {
            echo "Error saving blog post.";
        }
    }
}