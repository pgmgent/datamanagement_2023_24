<?php

//db connectie

$message = htmlspecialchars( $_POST['message'] ?? '' );
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);


//sql

//"INSERT INTO `message` (`message_id`, `user_id`, `message`, `created_on`) VALUES (NULL, '1', 'Dit is een test', current_timestamp())"

//prepare

//bind

//execute

//redirect naar index.php
header('Location: index.php');
