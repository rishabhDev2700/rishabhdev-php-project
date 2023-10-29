<?php
include('../includes/config.php');
include('../includes/functions.php');
include('../templates/header.php');
?>

<?php
$category_id = $_GET['id'];
$category = get_category_by_id($category_id);
if($category){
echo "<h1>{$category['name']}</h1>";
echo "<p>{$category['description']}</p>";
}else{
    echo "Category not found";
}
$posts = get_posts_by_category($category_id);

// Display posts
foreach ($posts as $post) {
    include('../templates/post.php');
}
?>

<?php include('../templates/footer.php'); ?>