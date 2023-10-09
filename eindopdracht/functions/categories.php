<?php

function getCategories() {
    global $db;

    $stmt = $db->prepare("SELECT * FROM categories");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}