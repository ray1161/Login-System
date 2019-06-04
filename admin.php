<?php
/**
 *admin page for login system
 *used for admin to view all orders
 *@author Pengge
 *@version 1.0
 */
    //database connect
    include 'dbconfig.php';
    //use session
    session_start();
    if(empty($_SESSION['login_user']))  //if no session in login_user, then jump back to login page
    {
        header("location:login.php");
        exit;
    }
    //get username from session (admin)
    $username = $_SESSION['login_user'];
    
    //backup code for database connect
    /*$con = mysqli_connect('localhost','root','1234','accounts');
    if (!$con)
    {
        die('Could not connect: ' . mysqli_error($con));
    }
    */
    //select orderlist data for this page
    mysqli_select_db($con,"orderlist");

    //select all rows from orderlist
    $sql = "SELECT * FROM orderlist";
    
    echo $username;
    //if no result, then error
    $result = mysqli_query($con,$sql);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }   
    
    echo "<table border='1'>
	   <tr>
	   <th>AccountName</th>
	   <th>Order ID</th>
	   <th>Product ID</th>
	   <th>Number of Purchase</th>
	   </tr>";
    
    //otherwise, print out all the rows
    while($row = mysqli_fetch_array($result))
    {
        echo "<tr>";
        echo "<td>" . $row['account'] . "</td>";
        echo "<td>" . $row['orderID'] . "</td>";
        echo "<td>" . $row['productID'] . "</td>";
        echo "<td>" . $row['amount'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    //close connection
    mysqli_close($con);
?>


<html>
   
   <head>
      <title>Order </title>
   </head>
   <body>
		<input type="button" value="GoBack" onclick="location.href='index.php'">
		<input type="button" value="Logout" onclick="location.href='logout.php'">
   </body>
   
</html>




