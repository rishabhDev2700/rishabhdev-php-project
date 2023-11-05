<?php
include '../templates/author-header.php';
?>


<form action="" method="post">
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="name">
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea class="form-control" id="description" name="description"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


<?php include 'templates/footer.php';?>