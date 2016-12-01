<?php 

include('./navbar_login.php'); 
session_start();
if(!isset($_SESSION['username'])){
   header("Location:index.php");
exit;  
}

?>