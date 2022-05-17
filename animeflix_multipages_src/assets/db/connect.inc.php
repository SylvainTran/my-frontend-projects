<?php
    define("SERVER","localhost");
    define("USER","root");
    define("PASS","");
    define("DB","clientdb");
    $connection=new mysqli(SERVER,USER,PASS,DB);
    if($connection->connect_errno){
        echo "Problem connecting to the db server.";
        exit();
    }
?>