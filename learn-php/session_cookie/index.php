<?php
session_start();

//deze hash kan opgehaald worden uit de database via de login 
//of uit de .env file als je bijvoorbeeld maar 1 gebruiker hebt
$correct_user = 'admin';
$correct_pass_hash = '$2y$10$B76Y6i8/7I2mS5IglXUfROrjx1Iu6mDsxgt7XYvNoh4HzDsZfdyvu';

$login = $_POST['login']  ?? '';
$password = $_POST['password'] ?? '';

//echo password_hash($password, PASSWORD_DEFAULT);

if($login && $password) {
    if($login == $correct_user && password_verify($password, $correct_pass_hash) ) {
        echo 'correct';
        $_SESSION['person'] = $login;
    } else {
        $_SESSION['person'] = null;
        echo 'incorrect'; 
    }
}

$person = $_SESSION['person'] ?? '';


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello world</title>
</head>
<body>
    <h1>Hi, <?= $person; ?></h1>

    <h2>Login</h2>
    <form method="POST">
        <p>
        <label for="login">Login</label>
        <input type="text" name="login">
        </p>
        <p>
        <label for="password">Password</label>
        <input type="password" name="password">
        </p>
        <button>Login</button>
    </form>

    <a href="page.php">Ga naar de pagina</a>
    <a href="logout.php">Log uit</a>
</body>
</html>