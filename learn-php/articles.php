
    <?php
    include_once 'partial/header.php';

    require_once 'includes/db.php';
    

    //2. query schrijven
    $query = "SELECT * FROM articles WHERE title like '%a%'";

    //3. query uitvoeren
    $statement = $pdo->query($query);

    //4. resultaat verwerken
    $articles = $statement->fetchAll(PDO::FETCH_ASSOC);

    //5. resultaat tonen

    foreach($articles as $article){
        echo "<li><a href=\"article.php?id={$article['article_id']}\">{$article['title']}</a></li>";
    }

    include_once 'partial/footer.php';

    ?>
