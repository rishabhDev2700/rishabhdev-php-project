<?php


function create_blog_post($title, $content, $author, $category_id)
{
    global $db;
    $sql = "INSERT INTO blog_posts (title, content, author_id, category_id) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("sssi", $title, $content, $author, $category_id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}
function update_blog_post($post_id, $title, $content, $author, $category_id)
{
    global $db;

    try {
        $sql = "UPDATE blog_posts SET title = ?, content = ?, author = ?, category_id = ? WHERE post_id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("sssii", $title, $content, $author, $category_id, $post_id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    } catch (Exception $e) {
        error_log("Error updating blog post: " . $e->getMessage());
        return false;
    }
}
function delete_blog_post($post_id)
{
    global $db;
    try {
        $sql = "DELETE FROM blog_posts WHERE post_id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $post_id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    } catch (Exception $e) {
        error_log("Error deleting blog post: " . $e->getMessage());
        return false;
    }
}

function mark_post_as_published($id)
{
    global $db;
    try {
        $sql = "UPDATE blog_posts SET published = 1 WHERE post_id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $post_id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    } catch (Exception $e) {
        error_log("Error marking post as published: " . $e->getMessage());
        return false;
    }
}

function mark_post_as_unpublished($id)
{
    global $db;
    try {
        $sql = "UPDATE blog_posts SET published = 0 WHERE post_id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $post_id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    } catch (Exception $e) {
        error_log("Error marking post as published: " . $e->getMessage());
        return false;
    }
}

function create_category($name, $description)
{
    global $db;
    try {
        $sql = "INSERT INTO categories (name,description) VALUES (?,?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ss", $name, $description);
        $result = $stmt->execute();
        $stmt->close();
        return true;
    }
    catch(Exception $e) {
        error_log("Error creating category: " . $e->getMessage());
        return false;
    }
}
function update_category($category_id, $new_name, $new_description) {
    global $db;
    try {
        $sql = "UPDATE categories SET name = ?, description = ? WHERE category_id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ssi", $new_name, $new_description, $category_id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    } catch (Exception $e) {
        error_log("Error updating category: " . $e->getMessage());
        return false;
    }
}
function delete_category($category_id)
{
    global $db;
    try {
        $sql = "DELETE FROM categories WHERE category_id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $category_id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    } catch (Exception $e) {
        error_log("Error deleting category: " . $e->getMessage());
        return false;
    }
}