<?php
session_start();
include_once('Connection.php');
if ($_POST['profileButton']) {
    $username=$_SESSION['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $birthdate = $_POST['birthdate'];
    $mobile = $_POST['mobile'];

    //Image querys
    $statusMsg = '';
    // File   upload path
    $targetDirectory = "C:/inetpub/wwwroot/1812315/TravelCommunity/profileImages/";
    $fileName =$_FILES["file"]["name"];
    $targetFilePath = $targetDirectory . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    if(isset($_POST["profileButton"]) && !empty($_FILES["file"]["name"])){
        // Allow certain file   formats
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes)){
            // Upload file to server tmp_name
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                // Insert image file name into database
                $query = "UPDATE  user
                SET firstname= '$firstname',
                lastname ='$lastname',
                address ='$address',
                city ='$city',
                country ='$country',
                birthdate='$birthdate',
                mobile='$mobile',
                userPhoto='$fileName'
                WHERE username = '$username'";
                $result = mysqli_query($conn, $query);
                if($result){
                    $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                    header('Location: interface.php');
                }else{
                    $statusMsg = "File upload failed, please try again.";
                }
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }else{
           $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
       }
    }else{
       $statusMsg = 'Please select a file to upload.';
   }
// Display status message
    echo $statusMsg;

}
?>
