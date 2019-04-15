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
    <title>Verification</title>
    <link rel="stylesheet" href="css/adminStyle.css">
    <link rel="stylesheet" href="css/unsemantic-grid-responsive-tablet.css">
</head>
<body>
<header>

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
    // create query to retrieve user information from the database
    $query = "SELECT * FROM user WHERE userLevel!='admin' AND verificationPhoto!='0' AND Authenticated=0";
    $result=mysqli_query($conn, $query);



    if(mysqli_num_rows($result)>0){
        while ($row= mysqli_fetch_assoc($result)){
            $userProfile=$row['username'];
            $firstname=$row['firstname'];
            $lastname=$row['lastname'];
            $email=$row['email'];
            $address=$row['address'];
            $city=$row['city'];
            $country=$row['country'];
            $birthdate=$row['birthdate'];
            $mobile=$row['mobile'];
            $profileImage =$row['userPhoto'];
            $profileUpload = "profileImages/".$profileImage;
            $verificationImage =$row['verificationPhoto'];
            $upload = "verificationImages/".$verificationImage;
        }
    }
    ?>
    <div class="viewProfileTable">
        <img src="<?php echo $profileUpload; ?>" height="50px" width="50px">
        <table>
            <tr><td>Username:</td><td class="label"><?php echo $userProfile; ?></td></tr>
            <tr><td>Firstname:</td><td  class="label"><?php echo $firstname; ?></td></tr>
            <tr><td>Lastname:</td><td class="label"><?php echo $lastname; ?></td></tr>
            <tr><td>Email:</td><td class="label"><?php echo $email; ?></td></tr>
            <tr><td>Address:</td><td class="label"><?php echo $address; ?></td></tr>
            <tr><td>City:</td><td class="label"><?php echo $city; ?></td></tr>
            <tr><td>Country:</td><td class="label"><?php echo $country; ?></td></tr>
            <tr><td>Birth:</td><td class="label"><?php echo $birthdate; ?></td></tr>
            <tr><td>Mobile:</td><td class="label"><?php echo $mobile; ?></td></tr>
        </table>
    </div>
    <div>
        <img src="<?php echo $upload; ?>" height="300px" width="300px">
    </div>
    <form action='Authentication.php' method='post'>

    <input type='hidden' name='user' value='<?php echo $userProfile; ?>'
        <label for="acceptVerify">Accept Verification</label>
        <input type='checkbox' value='1' name='acceptVerify'><br><br>
        <button type='submit' value='reject' name='submitVerify' class='btn'>Submit Verification</button><br>
    </form>
</main>
<!--Main Ends -->
<!-- Footer -->
<footer>

</footer>
</body>
</html>