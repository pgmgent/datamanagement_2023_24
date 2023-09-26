<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PGM Tweets</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php

//1. connectie maken met db
require_once 'includes/db.php';

$id = $_GET['id'] ?? 0;

 //user ophalen
 $query = "
    SELECT * 
    FROM `users`
    WHERE `user_id` = :user_id";

 //3. query uitvoeren
    //3.1 query voorbereiden
        $statement = $db->prepare($query);
    //3.2 parameters binden
        $statement->bindValue(':user_id', $id);
    //3.3 query uitvoeren
        $statement->execute();

 //4. resultaat verwerken
 $user = $statement->fetch();


 //berichten ophalen
 $query2 = "
    SELECT * 
    FROM `message`
    INNER JOIN `users` ON `message`.`user_id` = `users`.`user_id`
    WHERE `message`.`user_id` = :user_id
    ORDER BY `message_id` DESC 
    LIMIT 20";

 //3. query uitvoeren
 $statement = $db->prepare($query2);
$statement->bindValue(':user_id', $id);
 $statement->execute();

 //4. resultaat verwerken
 $messages = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container">
    <div class="messages">
        <h1><?= $user['first_name']; ?></h1>
        <?= $user['email']; ?>

        <h2><?= $user['first_name']; ?>'s messages</h2>
        <?php foreach($messages as $message) {

            include 'views/message.php';

        } ?>
        
        <div class="message">
            <div class="avatar"><img src="https://picsum.photos/id/237/100/100"></div>
            <div class="content">
                <div class="info"><a href="#">John Doe</a> &bull; @doe &bull; Donderdag 1 oktober 2020 11:03</div>
                <div class="tweet">Hi</div>
            </div>
        </div>
    </div>

</div>


</body>
</html>