<div class="post">
    <div class='card m-3' style='width: 24rem;'>
        <div class='card-body'>
            <img class='card-img' src='./Story-mode Cover.png' alt=''>
            <h5 class='card-title'><?php echo $post['title']; ?></h5>
            <h6 class='card-subtitle mb-2 text-body-secondary'><?php echo substr($post['content'],0,22); ?>...</h6>
            <a href="pages/article.php?id=<?php echo $post['post_id']; ?>" class='card-link'>Read full post</a>
        </div>
    </div>
</div>