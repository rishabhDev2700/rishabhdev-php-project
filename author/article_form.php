<?php
include("../includes/config.php");

include("../includes/functions.php");
$categories = get_categories() ?>
<form action="" method="post">
    <label for="title" class="form-label">Title</label>
    <input id="title" type="text" class="form-control" name="title" required>
    <script>
        tinymce.init({
            selector: 'textarea',
            content_style: 'img { max-width:60vw; height: auto; margin:1rem auto; }',
            formats: {
                customFormat: { block: 'p', classes: 'my-custom-class' }
            },
            plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
        });
    </script>
    <label for="wysiwyg" class="form-label">Content</label>

    <textarea id="wysiwyg" name="content">
        </textarea>
    <div>
        <select name="category">
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category['category_id']; ?>">
                    <?php echo $category['name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button class="px-3 py-2 m-3 text-white fs-4 btn btn-primary">Publish</button>
    </div>
</form>