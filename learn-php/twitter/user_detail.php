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

 //2. query schrijven
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

 print_r($user);

?>

<div class="container">
    <div class="messages">
        <h1></h1>

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