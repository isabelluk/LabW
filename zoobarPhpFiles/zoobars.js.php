<?php

    // txt-db-api library: http://www.c-worker.ch/txtdbapi/index_eng.php
    require_once("includes/php-txt-db/txt-db-api.php");
    require_once("login.php");
    require_once("includes/auth.php");
    require_once("includes/navigation.php");
    
    // Init global variables
    $db = new Database("zoobar");
    $user = new User($db);
    
?>
    
 
