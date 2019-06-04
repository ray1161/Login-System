<?php
/**
 *insert function for login system
 *used when user wants to insert new order
 *insert data into orderlist
 *@author Pengge
 *@version 1.0
 */
    //database connect
    include 'dbconfig.php';
    //enable session
    session_start();
    if(empty($_SESSION['login_user']))  //if no session in login_user, then jump back to login page
    {
        header("location:login.php");
        exit;
    }
    $username = $_SESSION['login_user'];

    //insert data

    $orderID=$_POST["oid"];
    $productID=$_POST["pid"];
    $number=$_POST["number"];
    //select orderlist as target database
    mysqli_select_db($con, "orderlist");
    //insert data
    $sql="INSERT INTO orderlist (orderID, account, productID, amount) VALUES ('$orderID', '$username', '$productID', '$number')";

    if (!mysqli_query($con,$sql))
    {
        die('Error: ' . mysql_error());
    } else {
        echo "1 record added";
        header("location:order.php");
    }
    mysql_close($con);
?>