<?php
include 'partial/head.php'; ?>
<div class="container">
    <h1>Add Article</h1>
    <form action="<?php __DIR__; ?>/system/content_insert.php" method="post">
        <div class="mb-3">
            <label class="form-label" for="title">Title</label>
            <input class="form-control" type="text" name="title" id="title"/>
        </div>
        <div class="mb-3">
            <label class="form-label" for="content">Content</label>
            <textarea class="form-control" id="content" rows="3" name="content" type="text"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php include 'partial/footer.php';
