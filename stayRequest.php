<?php
include_once('login.php');
include_once('Connection.php');
if ( isset($_SESSION['username'] )) {
    $username = $_SESSION['username'];
    $host=$_GET['host'];
    $query = "SELECT * FROM user, ratings WHERE user.username=ratings.username AND user.username ='$host'";
    $result = mysqli_query($conn, $query);
    while($row=mysqli_fetch_assoc($result)){
        $rated=$row['rating'];
        $hits=$row['hits'];
        if($hits>0) {
            $rank = $rated / $hits;
        }else {$rank=0;}
    }
}
else{
    header('Location: Index.php');
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search</title>
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


        <button class="dropbtn">Hosting
            <i class="dropDownMenu"></i>
        </button>
        <div class="dropdown-container">
            <a href="Host.php">Upload Home Images</a>
            <a href="hosting.php">Going to Host</a>
            <a href="hosted.php">You Hosted</a>
            <a href="requestsHost.php">Requests to Stay With you</a>
        </div>
        <button class="dropbtn">Traveling
            <i class="dropDownMenu"></i>
        </button>
        <div class="dropdown-container">
            <a href="toStay.php">You are going to stay</a>
            <a href="stayed.php">You stayed</a>
            <a href="requestsPending.php">Requests to Stay</a>
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
            <a href="searchHost.php">Search for host in a location</a>
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
        <form method="POST" action="request.php" class="requestForm" name="stayRequest">
            <p>Send a request to stay with <?php echo "$host" ?> <br>Current Rating: <?php echo "$rank" ?>/5</p>
            <input type="hidden" value="<?php echo $host; ?>" name="host" >
            <label for="dateFrom">When would you like to arrive?</label><br>
            <input type="date" name="dateFrom" class="inputbox"><br>
            <label for="dateTo">When would you like to stay until?</label><br>
            <input type="date" name="dateTo" class="inputbox"><br>
            <button type="submit" name="request" class="btn">Submit</button>
        </form>

</main>
<!--Main Ends -->
<!-- Footer -->
<footer>

</footer>
</body>
</html>