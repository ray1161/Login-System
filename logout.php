<?php
/**
 *logout page for login system
 *@author Pengge
 *@version 1.0
 */

session_start();

if(session_destroy()) {
    header("Location: login.php");
}
?>