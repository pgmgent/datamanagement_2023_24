<?php

session_start();

if(!isset($_SESSION['person']) && $_SESSION['person'] != 'admin') {
    header('Location: index.php');
    exit;
}

?>
Enkel ingelogde gebruikers mogen dit zien