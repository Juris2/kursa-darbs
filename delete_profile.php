<?php
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kursa_darbs";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$del_user = "delete from lietotaji where epasts = '".$_SESSION['username']."' LIMIT 1 ";
$run_user = mysqli_query($conn, $del_user);


session_destroy();
header('Location: index.php');

?>