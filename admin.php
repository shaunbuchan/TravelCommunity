<?php
include_once ('login.php');
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
    <title>user</title>

</head>
<body>
<header>
    <section class="echo"> <!-- This class name will enable the styling of output after logging in -->
        <h4>Welcome, you are an admin logged in as <?php echo $username ?></h4>
    </section>
    <section class="right">
        <form id = "logout"  method="post" action="logout.php">
            <button type="submit" value="Logout" name="logOutButton" class="btn"> Log out <br>
        </form>
    </section>
</header>

<section class="left">
    <div class="dropdown">
        <a href="interface.php">Home</a>
        <i class="dropDownMenu"></i>
    </div>

    <div class="dropdown">
        <button class="dropbtn">
            <a href="Inbox.php">Messages</a>
            <i class="dropDownMenu"></i>
        </button>
        <div class="dropdown-content">
            <a href="Inbox.php">View My Inbox</a>
            <a href="Outbox.php">view My Outbox</a>
        </div>
    </div>

    <div class="dropdown">
        <button class="dropbtn">
            <a href="toVerify.php">Verify Users</a>
            <i class="dropDownMenu"></i>
        </button>
        <div class="dropdown-content">
            <a href="toVerify.php">Verify Users</a>
        </div>
    </div>
    <!-- for now
        <div class="dropdown">
            <button class="dropbtn">
                <a href="event.php">Event</a>
                <i class="dropDownMenu"></i>
            </button>
            <div class="dropdown-content">
                <a href="viewallEvents.php">View All Events</a>
                <a href="viewMyEvents.php">View My Events </a>
                <a href="event.php">Create Event</a>
            </div>
        </div>
        -->
    <div class="dropdown">
        <button class="dropbtn">
            <a href="search.php">Search</a>
            <i class="dropDownMenu"></i>
        </button>
        <div class="dropdown-content">
            <a href="searchForUser.php">Search for a User</a>
        </div>
    </div>
</section>



</body>
</html>