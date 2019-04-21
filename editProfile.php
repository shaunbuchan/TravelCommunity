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
    <title>Edit Profile</title>
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
            <a href="Host.php">Host</a>
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
<main class="profilebackground">
    <div class="profileform">
        <form name="updateprofile" method="post" action="updateProfile.php" enctype="multipart/form-data">
            <h2>Edit Profile</h2>
            <label for="firstname">First name:</label><br>
            <Input type="text" placeholder='<?php echo $firstname; ?>' name="firstname" value='<?php echo $firstname; ?>' class="inputbox"><br>
            <label for="lastname">Last name:</label><br>
            <input type="text" placeholder='<?php echo $lastname; ?>' name="lastname" value='<?php echo $lastname; ?>' class="inputbox"><br>
            <label for="address">Address:</label><br>
            <Input type="text" placeholder='<?php echo $address; ?>' name="address" value='<?php echo $address; ?>' class="inputbox" ><br>
            <label for="city">City:</label><br>
            <input type="text" placeholder='<?php echo $city; ?>' name="city" value='<?php echo $city; ?>' class="inputbox" ><br>
            <label for="country">Country</label><br>
            <Input type="text" placeholder='<?php echo $country; ?>' name="country" value='<?php echo $country; ?>' class="inputbox"><br>
            <label for="datebirth">Date Of Birth:</label><br>
            <input type="date" placeholder='<?php echo $birthdate; ?>' name="birthdate" value='<?php echo $birthdate; ?>' class="inputbox"><br>
            <label for="mobile">Mobile Number:</label><br>
            <Input type="tel" placeholder='<?php echo $mobile; ?>' name="mobile" value='<?php echo $mobile; ?>' class="inputbox"><br>


            <div  id="dropBoxImg">
                <label for="imgUpload">Select file to upload for your profile image</label><br>
            </div>
            <input type="file" name="file" class="inputbox" id="imgInput" />
            <!-- Main Section End  <input type="submit" name="submit" value="Upload"/> -->

            <br><br>



            <div class="profilebtn">
                <button type="submit" value="updateProfile" name="profileButton" class="btn">Update Profile</button><br>
                <button type="submit" value="cancelprofile" name="cancelButton" class="btn">Cancel</button></div>
        </form>
    </div>
</main>
<!-- Main Section End  -->
<!-- Footer Starts -->

</body>
</html>