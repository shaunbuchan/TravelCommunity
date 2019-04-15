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
    <link rel="stylesheet" href="css/adminStyle.css">
    <link rel="stylesheet" href="css/unsemantic-grid-responsive-tablet.css">
</head>
<body>
<header>
<img src="images/logo.jpg" height="120px"; width="200px"; id ='logo2'>
<section class="headerLoggedIn"> <!-- This class name will enable the styling of output after logging in -->
    <h4 style="float: left; margin-top: 20px; margin-left: 70%;">Username: <?php echo $username ?></h4>
</section>
<section class="right">
    <form id = "logout"  method="post" action="logout.php">
        <button type="submit" value="Logout" name="logOutButton" class="btn"> Log out <br>
    </form>
</section>
</header>
<section>
    <div class="sidenav">
        <a href="interface.php">Home</a>

        <button class="dropbtn">Profile
            <i class="dropDownMenu"></i>
        </button>
        <div class="dropdown-container">
            <a href="viewProfile.php">View My Profile</a>
            <a href="editProfile.php">Edit Profile</a>
            <a href="verifyProfile.php">Verify Profile</a>
        </div>

        <button class="dropbtn">Messages
            <i class="dropDownMenu"></i>
        </button>
        <div class="dropdown-container">
            <a href="inbox.php">View My Inbox</a>
            <a href="outbox.php">View My Outbox</a>
        </div>

        <button class="dropbtn">Search
            <i class="dropDownMenu"></i>
        </button>
        <div class="dropdown-container">
            <a href="search.php">Search for a User</a>
            <a href="searchLocation.php">Search for host in a location</a>
        </div>
    </div>
    <script>
        /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
        var dropdown = document.getElementsByClassName("dropbtn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
    </script>
</section>
<main>
    <article class="window" style="width:90%; float: left; margin-left: 200px">
        <section style="margin-top: 20px; margin-left:20px">
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
        <table border-bottom-color="black">
            <tr><th style="width:75px">Title</th><th style="width: 200px">Message</th><th>To</th><th>Date</th></tr>
            <?php do{ ?>
            <tr style="border-bottom: #666666"><td style="width:75px"><?php echo $row['title']; ?></td><td style="width:200px"><?php echo $row['message']; ?></td><td><?php echo $row['toUser']; ?></td><td><?php echo $row['timestamp']; ?></td>
                <?php }while ($row= mysqli_fetch_assoc($result)) ?>
        </table>
    </div>
        </section>
</main>
<!--Main Ends -->
<!-- Footer -->
<footer>

</footer>
</body>
</html>