<?php
include_once('login.php');
include_once('Connection.php');
if ( isset($_SESSION['username'] )) {
    $username=$_SESSION['username'];
    $query = "SELECT * FROM user WHERE username='$username'";
    $result=mysqli_query($conn, $query);

    if(mysqli_num_rows($result)==1){
        while ($row= mysqli_fetch_assoc($result)){
            $firstname=$row['firstname'];
            $lastname=$row['lastname'];
            $email=$row['email'];
            $address=$row['address'];
            $city=$row['city'];
            $country=$row['country'];
            $birthdate=$row['birthdate'];
            $mobile=$row['mobile'];
            // $image =$row['u_img'];
            // $upload = "UploadImg/".$image;
        }
    }
}
else{
    header('Location: Index.php');
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify Profile</title>
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

    <div class="verifyform">
        <form name="verifyprofile" method="post" action="verification.php" enctype="multipart/form-data">
            <h2>Verify Profile</h2>
            <p>Please upload a scanned copy of your passport or international Drivers Licence to authenticate your profile.
                <br>Images must be kept under 500KB.</p>
<div  id="dropBoxImg">
    <label for="imgUpload">Select file to upload</label><br>
</div>
<input type="file" name="file" class="inputbox" id="imgInput" />

<div class="profilebtn">
    <button type="submit" value="verifyProfile" name="verifyButton" class="btn">Verify Profile</button><br>
    <button type="submit" value="cancelprofile" name="cancelButton" class="btn">Cancel</button></div>
</form>
</div>

</main>
<!-- Main Section End  -->
<!-- Footer Starts -->

</body>
</html>