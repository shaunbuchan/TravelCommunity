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
</head>

<body>

<main class="profilebakground">
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
                <label for="imgUpload">Select file to upload</label><br>
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