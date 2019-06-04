<?php
/**
 *config page for database connection
 *@author Pengge
 *@version 1.0
 */

    //database info
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    
    //connect to database
    $con = mysqli_connect($servername, $username, $password);
    
    //choose certain database
    mysqli_select_db($con, "accounts");
    
    //check whether it's successful or not
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>