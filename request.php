<?php
session_start();
include_once('Connection.php');
$username=$_SESSION['username'];
$host=$_POST['host'];
$dateFrom = $_POST['dateFrom'];
$dateTo=$_POST['dateTo'];

$query = "INSERT INTO requests(host, guest, dateFrom, dateTo) 
          VALUES('$host','$username', '$dateFrom', '$dateTo')";

if (mysqli_query($conn, $query)) {

        header('Location: requestsPending.php');
    }else{
        header('Location: searchHost.php');
    }

?>