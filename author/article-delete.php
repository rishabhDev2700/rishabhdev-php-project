<?php
include("../includes/config.php");
include("../includes/functions.php");
include("../templates/author-header.php");
include("../includes/author_functions");
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["post_id"])) {
    $post_id_to_delete = intval($_POST["post_id"]);
    delete_blog_post($post_id_to_delete);
    header("Location: login.php");
exit();

}

$posts = get_blog_posts();
?>
<ol class="list-group list-group-numbered">
    <?php
    foreach ($posts as $post) {
        echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
        echo $post['title'];
        echo '<form action="" method="post">';
        echo "<input type='hidden' value={$post['post_id']} name='post_id'>";
        echo '<button class="btn btn-danger" type="submit">Delete</button>';
        echo '</form>';
        echo '</li>';
        ;
    }
    ?>

</ol>