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
    <title>Sent Messages</title>

</head>
<body>

<main>
    <?php
    $query = "SELECT * FROM user_mailboxes LEFT JOIN messages ON messages.messageID = user_mailboxes.message_id
    WHERE user_mailboxes.user = '$username' AND user_mailboxes.mailbox = 'out' ORDER BY timestamp DESC";
    $result=mysqli_query($conn, $query);
    $row= mysqli_fetch_assoc($result);
    if($row==0){
        echo "you currently have no messages in your outbox";
    }
    else{
        $title=$row['title'];
        $message=$row['message'];
        $toUser=$row['toUser'];
        $when=$row['timestamp'];
    }
    ?>

    <div class="viewMessages">
        <table>
            <tr><th>Title</th><th>Message</th><th>To</th><th>Date</th></tr>
            <?php do{ ?>
            <tr><td><?php echo $row['title']; ?></td><td><?php echo $row['message']; ?></td><td><?php echo $row['toUser']; ?></td><td><?php echo $row['timestamp']; ?></td>
                <?php }while ($row= mysqli_fetch_assoc($result)) ?>
        </table>
    </div>
</main>
<!--Main Ends -->
<!-- Footer -->
<footer>

</footer>
</body>
</html>