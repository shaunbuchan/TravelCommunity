<?php
//if(isset($_GET['logout')){ and then code out session start
//session_start();
session_destroy();
unset($_SESSION['username']);
header('Location: Index.php');
?>