<?php
include_once ('login.php');
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
    <title>admin</title>
    <link rel="stylesheet" href="css/adminStyle.css">
    <link rel="stylesheet" href="css/unsemantic-grid-responsive-tablet.css">
</head>
<body><header>

    <img src="images/logo.jpg" height="120px"; width="200px"; id ='logo2'>
    <section class="headerLoggedIn"> <!-- This class name will enable the styling of output after logging in -->
        <h4 style="float: left; margin-top: 20px; margin-left: 70%;">Welcome,  <?php echo $username ?></h4>
    </section>
    <section class="right">
        <form id = "logout"  method="post" action="logout.php">
            <button type="submit" value="Logout" name="logOutButton" class="btn"> Log out <br>
        </form>
    </section>
</header>

<div class="sidenav">
    <a href="admin.php">Home</a>

    <button class="dropbtn">Verify Users
        <i class="dropDownMenu"></i>
    </button>
    <div class="dropdown-container">
        <a href="toVerify.php">Verify Users</a>
    </div>

    <button class="dropbtn">Messages
        <i class="dropDownMenu"></i>
    </button>
    <div class="dropdown-container">
        <a href="adminInbox.php">View My Inbox</a>
        <a href="adminOutbox.php">View My Outbox</a>
    </div>

    <button class="dropbtn">Search
        <i class="dropDownMenu"></i>
    </button>
    <div class="dropdown-container">
        <a href="adminSearch.php">Search for a User</a>
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
<main>
    <article class="window" style="width:90%; float: left; margin-left: 200px">
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
                $msgList .="<a href='viewAdminMessages.php?msgID=".$msgID."' class ='cat_links'>".$title." -<br> <font size=''-3', color='#778899'>".$fromUser."<br></a>";
            }
            echo $msgList;
        } else{
            echo "<p  class='searchresult'>Your Inbox is currently empty</p>";
        }
        ?>

</main>

</body>
</html>