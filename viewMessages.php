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
    //if(isset($_GET['msgID'])) {
    $msgID = $_GET['msgID'];
    //}
    $query = "SELECT * FROM messages  
              WHERE messages.messageID ='$msgID'";
    $result=mysqli_query($conn, $query);
    if(mysqli_num_rows($result)==1){
        while ($row= mysqli_fetch_assoc($result)){
            $msgID=$row['messageID'];
            $title=$row['title'];
            $message=$row['message'];
            $profile=$row['fromUser'];
            $timestamp=$row['timestamp'];
        }
    }
    ?>

    <div class="Inbox">
        <form >
            <h1><?php echo "Message from: $profile" ?></h1>
            <p style="color: #dddddd">Was delivered on <font color="#00ced1"><?php echo $timestamp; ?></font> </p>
            <p style="color: #dddddd">Title: <font color="#00ced1"><?php echo $title; ?></font> </p>
            <p style="color: #dddddd">Message: <font color="#00ced1"><?php echo $message; ?></font> </p>
        </form>


    </div>

    <div class="pmReply">
        <form action="sendmessage.php" method="post">
            <p>Reply to <?php echo $profile; ?>: </p>
            <textarea name="message" cols="75" rows="5"></textarea>
            <br>
            <input type="hidden" name="user" value="<?php echo $profile; ?>">

            <button type="submit" value="messageReply" name="replyMessage" class="btn">Send Message</button><br>
        </form>


    </div>
</main>
</body>
</html>