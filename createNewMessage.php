<?php
include_once('login.php');
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
    <title>Message</title>


</head>
<body>
<?php

if(isset($_GET["user"]))
{
    $userProfile = $_GET["user"];
//simple form here need action page seperate
    // redirected to sentbox
}
?>
<p>Send Message to : <?php echo $userProfile; ?> </p>

<main>
    <form method="Post" action="sendmessage.php">
        <input type="hidden" name="user" value="<?php echo $userProfile; ?>" />
        <label for="title">Message Title:</label><br>
        <Input type="text" name="title" class="inputbox"><br>
        <textarea name="message" cols="75" rows="5"></textarea><br>
        <button type="submit" name="sendmessage" class="btn">Send message</button>
    </form>


</main>
<!--Main Ends -->
<!-- Footer -->
<footer>

</footer>
</body>
</html>