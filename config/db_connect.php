<?php

// MYSQLi

// connect to database using MYSQli
    $conn = mysqli_connect('localhost', 'name', 'password', 'db-name');

    // check connection
    if(!$conn) {        
        //die("Connection failed: " . mysqli_connect_error());
        echo 'Connection error:' . mysqli_connect_error();
    }

?>