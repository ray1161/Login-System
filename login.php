<?php
/**
 *login page for login system
 *used for user to login
 *if admin, then jump to admin.php
 *if normal user, then jump to index.php
 *@author Pengge
 *@version 1.0
 */
    //connect to db
    include 'dbconfig.php';
    session_start();
    
    //process method: post
    if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // get username and password from form
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    //select certain row with entered username and password
    $sql = "select * from account where username = '$username' and password = '$password'";
    $result = mysqli_query($con,$sql);  //search $sql row in #con db;
    $count = mysqli_num_rows($result); //how many rows the result have
    
    // If only 1 row match, then it's correct username and password
    if($count == 1) {
        //whether it's an admin login or user login
        if ($username == "admin" && $password == "0000") {
            $_SESSION['login_user'] = $username;
            //admin jump to admin.php
            header("location: admin.php");
        }
        else {
            //save username to session
            $_SESSION['login_user'] = $username;
            // login successful, jump to index.php ->normal user
            header("location: index.php");
        }
    }
    else {
        //if not equal 1, failed login
        $error = "Your Login Name or Password is invalid";
        echo $error;
    }
}
?>
<html>
   <head>
      <title>Login Page</title>      
   </head>
   <body>
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;">
            	<b>Login</b>
            </div>		
           	<div style = "margin:30px">
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>	
            </div>		
         </div>	
      </div>
   </body>
</html>