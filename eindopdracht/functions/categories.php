<?php

function getCategories() {
    global $db;

    $stmt = $db->prepare("SELECT * FROM categories");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function getCategoriesByArticle($article_id) {
    global $db;

    $stmt = $db->prepare("SELECT category_id FROM article_category WHERE article_id = :article_id");
    $stmt->bindValue(':article_id', $article_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}