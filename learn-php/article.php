
<?php
require_once 'includes/db.php'; 
include_once 'partial/header.php';

$article_id = $_GET['id'];

//2. query schrijven
$query = "SELECT * FROM articles WHERE article_id = $article_id";

//3. query uitvoeren
$statement = $pdo->query($query);

//4. resultaat verwerken
$article = $statement->fetch();

//5. resultaat tonen
include 'views/articles/detail.php';
//echo "<h1>{$article['title']}</h1>{$article['content']}";

include_once 'partial/footer.php';

