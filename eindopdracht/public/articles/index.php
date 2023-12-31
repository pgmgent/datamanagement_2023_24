<?php
require_once '../../app.php';
include_once "$dir/partial/header.php";
?>

<h1>Articles</h1>

<form class="form" method="GET">
    <div class="row mb-4">
        <div class="col-auto">
            <label for="search" class="sr-only">Search</label>
            <input type="text" name="search" id="search" class="form-control" placeholder="Searchterm">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
        <div class="col text-end">
            <a href="/articles/edit.php" class="btn btn-success">Add article</a>
        </div>
    </div>
</form>

<div class="list-group">
<div class="list-group-item bg-light">
    <div class="row">
        <div class="col-auto">
            Title
        </div>
        <div class="col-auto d-none d-lg-block">
            Verberg bij kleiner worden
        </div>
        <div class="col-3">
            Actions
        </div>
    </div>
</div>
<?php
$search = $_GET['search'] ?? '';
$articles = getArticles($search);
foreach ($articles as $article) {
    include "$dir/views/articles/item.php";
}
?>
</div>

<?php
include_once "$dir/partial/footer.php";
