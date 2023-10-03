<?php
require_once '../app.php';
include_once "$dir/partial/header.php";

$id = $_GET['id'] ?? 0;

$article = getArticleById($id);

if(count($_POST)) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $id = $_POST['id'];

    print_r($_POST);

    //updateArticle($id, $title, $content);

}


?>

<h1>Edit article</h1>

<form method="POST">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" id="title" value="<?= $article->title; ?>">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control" name="content" id="content" rows="3"></textarea>
    </div>
    <input type="hidden" name="id" value="<?= $id; ?>">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php
include_once "$dir/partial/footer.php";
