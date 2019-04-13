<?php
include_once('login.php');
include_once('Connection.php');
if ( isset($_SESSION['username'] )) {
    $username = $_SESSION['username'];
}
else{
    header('Location: Index.php');
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Messages</title>

</head>
<body>

<main>
    <?php
    $query2 = "SELECT * FROM user_mailboxes LEFT JOIN messages ON messages.messageID = user_mailboxes.message_id 
              WHERE user_mailboxes.user = '$username' AND user_mailboxes.mailbox = 'in'";
    $result=mysqli_query($conn, $query2);
    // print_r($result);
    // exit();
    //$row= mysqli_fetch_assoc($result);
    $msgList="";
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $msgID=$row['messageID'];
            $title=$row['title'];
            $message=$row['message'];
            $fromUser=$row['fromUser'];
            $when=$row['timestamp'];
            $msgList .="<a href='viewMessages.php?msgID=".$msgID."' class ='cat_links'>".$title." -<br> <font size=''-3', color='#778899'>".$fromUser."<br></a>";
        }
        echo $msgList;
    } else{
        echo "<p  class='searchresult'>Your Inbox is currently empty</p>";
    }
    ?>

</main>
<!--Main Ends -->
<!-- Footer -->
<footer>

</footer>
</body>
</html>