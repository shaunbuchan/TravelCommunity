<?php
session_start();
include_once('Connection.php');
$username=$_SESSION['username'];
$title=$_POST['title'];
$message = $_POST['message'];
$userProfile=$_POST['user'];

$query = "INSERT INTO messages(title, message, fromUser, toUser, hasRead) 
          VALUES('$title','$message', '$username', '$userProfile', 0)";

if (mysqli_query($conn, $query)) {
    $lastID = mysqli_insert_id($conn);

    $query2="INSERT INTO user_mailboxes(user, mailbox, message_id) VALUES ('$username', 'out', '$lastID')";
    $query3="INSERT INTO user_mailboxes(user, mailbox, message_id) VALUES ('$userProfile', 'in', '$lastID')";
    $result2=mysqli_query($conn, $query2);
    $result3-mysqli_query($conn,$query3);
    if($username!='admin'){
        header('Location: outBox.php');
    }else{
        header('Location: adminOutBox.php');
    }
} else {
    echo "Failed to register";
}
?>