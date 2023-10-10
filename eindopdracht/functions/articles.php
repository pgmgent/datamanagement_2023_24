<?php

function getArticles($search = '') {
    global $db;

    $sql = "SELECT * FROM articles";
    if($search) {
        $sql .= " WHERE title LIKE :search OR content LIKE :search";
    }
    $stmt = $db->prepare($sql);
    if($search) {
        $stmt->bindValue(':search', "%$search%");
    }
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function getArticleById($id) {
    global $db;

    $stmt = $db->prepare("SELECT * FROM articles WHERE article_id = :id");
    $stmt->bindValue(':id', $id);
    //$stmt->bindParam(':id', $id, PDO::PARAM_INT); //PDO::PARAM_INT
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
    //return $stmt->fetchObject();
}

function updateArticle($id, $title, $content, $categories) {
    global $db;

    $stmt = $db->prepare("UPDATE articles SET title = :title, content = :content WHERE article_id = :id");
    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':title', $title);
    $stmt->bindValue(':content', $content);
    $stmt->execute();

    updateArticleCategories($id, $categories);
    
}

function insertArticle($title, $content, $categories) {
    global $db;

    $stmt = $db->prepare("INSERT INTO articles (title, content) VALUES (:title, :content)");
    $stmt->bindValue(':title', $title);
    $stmt->bindValue(':content', $content);
    $stmt->execute();

    $article_id = $db->lastInsertId();

    updateArticleCategories($article_id, $categories);
}

function updateArticleCategories($article_id, $categories) {
    global $db;
    //delete all categories for this article
    $stmt = $db->prepare("DELETE FROM article_category WHERE article_id = :id");
    $stmt->bindValue(':id', $article_id);
    $stmt->execute();

    //insert new categories for this article
    foreach($categories as $category) {
        $stmt = $db->prepare("INSERT INTO article_category (article_id, category_id) VALUES (:article_id, :category_id)");
        $stmt->bindValue(':article_id', $article_id);
        $stmt->bindValue(':category_id', $category);
        $stmt->execute();
    }
}