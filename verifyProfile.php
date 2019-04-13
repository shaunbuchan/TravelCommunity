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
</head>

<body>

<main class="profilebakground">
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