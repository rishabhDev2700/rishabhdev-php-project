<?php
function get_blog_posts()
{
    global $db;
    $sql = "SELECT * FROM blog_posts";
    $result = $db->query($sql);
    if ($result === false) {
        return false;
    }
    $posts = $result->fetch_all(MYSQLI_ASSOC);
    $result->free_result();
    return $posts;
}

function get_categories()
{
    global $db;
    $sql = "SELECT * FROM categories";
    $result = $db->query($sql);
    if ($result === false) {
        return false;
    }
    $categories = $result->fetch_all(MYSQLI_ASSOC);
    $result->free_result();
    return $categories;
}


function get_category_by_id($category_id)
{
    global $db;

    try {
        $sql = "SELECT * FROM categories WHERE category_id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $category_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $category = $result->fetch_assoc();
        $result->free_result();
        $stmt->close();
        return $category;
    } catch (Exception $e) {
        error_log("Error getting category by ID: " . $e->getMessage());
        return false;
    }
}


function get_blog_post_by_id($id)
{
    global $db;
    $sql = "SELECT * FROM blog_posts WHERE post_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $post = $result->fetch_assoc();
    return $post;
}


function get_posts_by_category($category_id)
{
    global $db;
    try {
        $sql = "SELECT * FROM blog_posts WHERE category_id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $category_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $posts = $result->fetch_all(MYSQLI_ASSOC);
        $result->free_result();
        $stmt->close();
        return $posts;
    } catch (Exception $e) {
        error_log("Error getting posts by category: " . $e->getMessage());
        return false;
    }
}


function get_last_six_posts() {
    global $db;

    try {
        $sql = "SELECT * FROM blog_posts ORDER BY post_id DESC LIMIT 6";
        $result = $db->query($sql);
        if ($result === false) {
            return false;
        }
        $posts = $result->fetch_all(MYSQLI_ASSOC);
        $result->free_result();
        return $posts;
    } catch (Exception $e) {
        error_log("Error getting last six blog posts: " . $e->getMessage());
        return false;
    }
}



function validate_email($email)
{
    $pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    if (preg_match($pattern, $email)) {
        return true;
    } else {
        return false;
    }
}

function save_subscription_email($email) {
    global $db;

    // Validate email (you can use filter_var or other validation methods)
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        try {
            // Insert the email into the newsletter_subscribers table
            $sql = "INSERT INTO newsletter_subscribers (email) VALUES (?)";
            $stmt = $db->prepare($sql);
            $stmt->bind_param("s", $email);
            $result = $stmt->execute();
            $stmt->close();

            return $result;
        } catch (Exception $e) {
            // Log the error or handle it as needed
            error_log("Error saving subscription email: " . $e->getMessage());
            return false;
        }
    } else {
        // Invalid email format
        return false;
    }
}

function save_contact_message($name, $email, $message) {
    global $db;

    try {
        // Insert the contact message into the contact_messages table
        $sql = "INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $message);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    } catch (Exception $e) {
        // Log the error or handle it as needed
        error_log("Error saving contact message: " . $e->getMessage());
        return false;
    }
}