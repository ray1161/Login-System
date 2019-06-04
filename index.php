<?php 
/**
 *index page for login system
 *only used for normal user to submit orders
 *user can choose to submit new order, view previous order, or logout
 *@author Pengge
 *@version 1.0
 */
    //session part
    session_start();
    if(empty($_SESSION['login_user']))  //if no session in login_user, then jump back to login page
    {
        header("location:login.php");
        exit;
    }
    //get username from session
    $username = $_SESSION['login_user'];
?>

<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $username; ?></h1>
      <div style="float: left; text-align: right;">
      	<form method="POST" action="insert.php">
      		Order ID:<input type = "text" name = "oid" required>
      		<br>
			Product ID:<input type = "text" name = "pid" required>
			<br>
			Number of purchase:<input type = "text" name = "number" required>
			<br>
			<input type="submit" value="Submit" onclick="location.href='insert.php'">
			<input type="button" value="Previous" onclick="location.href='order.php'">
			<input type="button" value="Logout" onclick="location.href='logout.php'">

		</form> 
      </div> 
   </body>
   
</html>