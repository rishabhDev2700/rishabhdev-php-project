<?php
include('../includes/config.php');
include('../includes/functions.php');
include('../templates/header.php');
?>

<?php
$post_id = $_GET['id'];
$post = get_blog_post_by_id($post_id);
if ($post) {}
else{
    echo 'Error Occurred';
}
?>
<h1>
    <?php echo $post['title'] ?>
</h1>
<!-- <img class='cover img-thumbnail' src=<?php echo $post['cover'] ?> alt="Cover"> -->
<?php echo $post['content'] ?>


<?php include('../templates/footer.php'); ?>