<?php

//connecteren met db via PDO
    //1. connectie maken met db
    CONST DB_DSN = 'mysql:dbname=db;host=db;port=3306';
    CONST DB_USER = 'db';
    CONST DB_PWD = 'db';

    $pdo = new PDO(DB_DSN, DB_USER, DB_PWD);