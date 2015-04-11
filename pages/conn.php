<?php

    try {

    define('DB_DSN', 'mysql:host=localhost;dbname=db_gcc_assets2'); // server configuration
    define('DB_USERNAME', 'root'); // server user name
    define('DB_PASSWORD', ''); // server password

    $pdo = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD); // instantiate new PDO connection
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ERROR HANDLING MODE: OOP
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); // FETCH MODE: Database Object

    } catch (PDOException $e) {

        print $e->getMessage(); // get PDO error, warning and exception message

    } // try connection otherwise print exception message
?>
