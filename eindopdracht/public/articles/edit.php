<?php
require_once '../../app.php';
include_once "$dir/partial/header.php";

$id = $_GET['id'] ?? 0;

$article = ($id) ? getArticleById($id) : null;

if(count($_POST)) {
    //Gebruiker heeft op submit geklikt
    $errors = [];
    //validatie
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
    if(!$title) {
        $errors[] = 'Title is required';
    }
    $content = filter_input(INPUT_POST, 'content');

    if(count($errors) == 0) {
        if($id) {
            //update
            updateArticle($id, $title, $content);
        } else {
            //insert
            insertArticle($title, $content);
        }
        redirect('/articles/index.php');
    }
} 

?>

<h1><?= ($id) ? 'Edit' : 'Add'; ?> article</h1>

<?php displayErrors($errors); ?>

<form method="POST">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" id="title" value="<?= $_POST['title'] ?? $article->title ?? ''; ?>" maxlength="200"> 
        <!-- hier beter een required attribuut gebruiken, maar om de validatie te testen heb ik die weggehaald -->
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control" name="content" id="content" rows="3"><?= $_POST['content'] ?? $article->content ?? ''; ?></textarea>
    </div>
    <input type="hidden" name="id" value="<?= $id; ?>">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php
include_once "$dir/partial/footer.php";
