<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    //connecteren met db via PDO
    //1. connectie maken met db
    CONST DB_DSN = 'mysql:dbname=db;host=db;port=3306';
    CONST DB_USER = 'db';
    CONST DB_PWD = 'db';

    $pdo = new PDO(DB_DSN, DB_USER, DB_PWD);

    //2. query schrijven
    $query = "SELECT * FROM articles WHERE title like '%a%'";

    //3. query uitvoeren
    $statement = $pdo->query($query);

    //4. resultaat verwerken
    $articles = $statement->fetchAll(PDO::FETCH_ASSOC);

    //5. resultaat tonen

    foreach($articles as $article){
        echo "<h1>" . $article['title'] . "</h1>";
        echo "<p>" . $article['content'] . "</p>";
    }


    ?>
</body>
</html>