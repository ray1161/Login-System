<?php
/**
 *order page for login system
 *used for user to display all orders under their username
 *user can choose to goback to index page or logout directly
 *@author Pengge
 *@version 1.0
 */
    //database connect
    include 'dbconfig.php';
    //start session
    session_start();
    //if nothing in session, then back to login page
    if(empty($_SESSION['login_user']))  //if no session in login_user, then jump back to login page
    {
        header("location:login.php");
        exit;
    }
    //get username from session
    $username = $_SESSION['login_user'];
    //select orderlist as default databse
    mysqli_select_db($con,"orderlist");

    //select all rows with this username
    $sql = "SELECT * FROM orderlist WHERE account= '$username'";
    echo $username;
    //if nothing match, then print error
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
    //otherwise, print out all the rows under this account
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




