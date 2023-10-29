<?php include 'templates/header.php';?>
<div class="d-flex align-items-center">
    <img class="img-thumbnail object-fit-cover" src="assets/profile.JPG" width="300px">
    <pre class="container fs-5">
        Hello I am <span class="text-danger">Rishabh</span>, I am a Full-stack developer,
        Programming Tutor and technical content writer.
        In this blog I share my experiences and my journey
        of learning various technologies.
        <strong>
            Subscribe to my newsletter to get latest updates.
        </strong>
        <button class="btn btn-info text-white fw-bold px-5 py-4">Subscribe</button>
    </pre>
</div>

<h1 class="mt-5">Latest Blog Posts</h1>

<div class="container mt-4 d-flex flex-wrap">
    <?php
    $posts = get_last_six_posts();
    if ($posts) {
        foreach ($posts as $post) {
            include 'templates/post.php';
        }
    } else {

        echo "No blog posts found.";

    }
    ?>

    <?php include('includes/footer.php'); ?>