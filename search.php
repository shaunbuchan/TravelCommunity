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
    <form method="GET" action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="searchbar">
        <input name="keyword" placeholder="Search... " size="50" id="searchBox">
        <button type="submit" class="btn">Search</button>
    </form>

    <?php
    if(isset($_GET["keyword"])){
        $keyword = $_GET["keyword"];
    }else{
        $keyword="";
    }
    $result = "";

    $query = "SELECT * FROM user WHERE username !='$username' AND userLevel !='admin' AND username LIKE '%" . $keyword . "%' ";
    $result = mysqli_query($conn, $query);

    $userList="";
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $userProfile=$row['username'];
            $userList .="<a style='margin-left: 20px' href='createNewMessage.php?user=".$userProfile."' class ='cat_links'>".$userProfile." -<br> <font size=''-3', color='red'><br></a>";
        }
        echo $userList;
    } else{
        echo "<p style='color: black' class='searchresult'>There are no users associated with $keyword </p>";
    }
    ?>

</main>
<!--Main Ends -->
<!-- Footer -->
<footer>

</footer>
</body>
</html>