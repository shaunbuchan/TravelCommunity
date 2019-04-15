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
            <p style="color: black;">Was delivered on <font color="red"><?php echo $timestamp; ?></font> </p>
            <p style="color: black;">Title: <font color="red"><?php echo $title; ?></font> </p>
            <p style="color: black;">Message: <font color="red"><?php echo $message; ?></font> </p>
        </form>


    </div>

    <div class="pmReply">
        <form action="sendmessage.php" method="post">
            <p style="color:black;">Reply to <font color="red"><?php echo $profile; ?>: </p>
            <label for="title" style="color:black">Message Title:</label>
            <Input type="text" name="title" size=40 class="inputbox"><br><br>
            <textarea name="message" cols="100" rows="10"></textarea>
            <br>
            <input type="hidden" name="user" value="<?php echo $profile; ?>">

            <button type="submit" value="messageReply" name="replyMessage" class="btn">Send Message</button><br>
        </form>


    </div>
</main>
</body>
</html>