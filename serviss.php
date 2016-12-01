<?php
session_start();
if (isset($_SESSION['username']))
    echo "Currently logged in as: {$_SESSION['username']}";
else
    echo "Not logged in";
?>