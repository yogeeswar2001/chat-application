<?php
    $hostname = "localhost";
    $username = "root";
    $pwd = "yogeeswar";
    $db = "chat_app";

    $conn = mysqli_connect($hostname, $username, $pwd, $db);
    
    if( !$conn ) 
        die("CONNECTION FAILED: ".mysqli_connect_error());
?>
