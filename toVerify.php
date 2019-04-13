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

</head>
<body>
<main>
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
        <input type='checkbox' value='yes' name='acceptVerify'><br><br>
        <button type='submit' value='reject' name='submitVerify' class='btn'>Submit Verification</button><br>
    </form>
</main>
<!--Main Ends -->
<!-- Footer -->
<footer>

</footer>
</body>
</html>