<?php
include("../includes/config.php");
include("../includes/functions.php");
include("../templates/author-header.php");
?>

<div class="m-2">
    <a class="btn btn-primary p-3" href="category_create.php">Create Category</a>
    <a class="btn btn-primary p-3" href="article-create.php ">Create Article</a>
</div>
<div class="m-2">
    <!-- <a class="btn btn-danger p-3" href="category_create.php">Delete Category</a> -->
    <a class="btn btn-danger p-3" href="article-delete.php ">Delete Article</a>
</div>

<?php
include("../templates/footer.php");
?>