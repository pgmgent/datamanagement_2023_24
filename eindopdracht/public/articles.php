<?php
require_once '../app.php';
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
    </div>
</form>

<div class="list-group">
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
