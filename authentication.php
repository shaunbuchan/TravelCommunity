<?php
session_start();
include_once('Connection.php');
$username=$_SESSION['username'];
if (isset($_POST['submitVerify'])) {
    $verify = $_POST['acceptVerify'];
    if ($verify == 1) {
        $userProfile = $_POST['user'];
        $query = "UPDATE  user
                SET Authenticated ='1'
                WHERE username = '$userProfile'";
        $result = mysqli_query($conn, $query);

        $query2 = "INSERT INTO messages(title, message, fromUser, toUser, hasRead) 
          VALUES('authentication','Thanks for authenticating your profile', '$username', '$userProfile', 0)";

        if (mysqli_query($conn, $query2)) {
            $lastID = mysqli_insert_id($conn);

            $query3 = "INSERT INTO user_mailboxes(user, mailbox, message_id) VALUES ('admin', 'out', '$lastID')";
            $query4 = "INSERT INTO user_mailboxes(user, mailbox, message_id) VALUES ('$userProfile', 'in', '$lastID')";
            $result3 = mysqli_query($conn, $query3);
            $result4 = mysqli_query($conn, $query4);
            if ($result) {
                header('Location: admin.php');
            }
        }
    }
}
?>