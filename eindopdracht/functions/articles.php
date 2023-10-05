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

function updateArticle($id, $title, $content) {
    global $db;

    $stmt = $db->prepare("UPDATE articles SET title = :title, content = :content WHERE article_id = :id");
    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':title', $title);
    $stmt->bindValue(':content', $content);
    $stmt->execute();
}

function insertArticle($title, $content) {
    global $db;

    $stmt = $db->prepare("INSERT INTO articles (title, content) VALUES (:title, :content)");
    $stmt->bindValue(':title', $title);
    $stmt->bindValue(':content', $content);
    $stmt->execute();
}