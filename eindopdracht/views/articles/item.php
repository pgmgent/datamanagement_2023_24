<div class="list-group-item list-group-item-action">
    <div class="row">
        <div class="col-5">
            <a href="/articles/edit.php?id=<?= $article->article_id ?>"><?= $article->title ?></a>
        </div>
        <div class="col-4 d-none d-lg-block">
            Verberg bij kleiner worden
        </div>
        <div class="col-3">
            <a href="/articles/edit.php?id=<?= $article->article_id ?>" class="btn btn-light btn-sm">Edit</a>
            <a href="/articles/delete.php?id=<?= $article->article_id ?>" class="btn btn-danger btn-sm">Delete</a>
        </div>
    </div>
</div>