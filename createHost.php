<?php
session_start();
include_once('Connection.php');
$username = $_SESSION['username'];
if ($_POST['createHostButton']) {

//Image querys
    $statusMsg = '';
    // File   upload path
    $targetDirectory = "C:/inetpub/wwwroot/1812315/TravelCommunity/hostImages/";
    $fileName =$_FILES["file"]["name"];

    $fileSize=$_FILES["file"]["size"];
    $targetFilePath = $targetDirectory . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
// $pass= md5($password);
if(isset($_POST["createHostButton"]) && !empty($_FILES["file"]["name"])){
// Allow certain file   formats
$allowTypes = array('jpg','png','jpeg','gif','pdf');
if(in_array($fileType, $allowTypes)){
if($fileSize<=500000) {
// Upload file to server tmp_name
if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
    $query = "INSERT INTO host(h_username, hostPhoto, imageNumber) 
          VALUES('$username', '$email', '$password','1')";
    $result = mysqli_query($conn, $query);
if($result){
    $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
    header('Location: interface.php');
} else {
    $statusMsg = "File upload failed, please try again.";
}
} else {
    $statusMsg = "Sorry, there was an error uploading your file.";
}
}else{
    $statusMsg = 'Sorry, your file size is too large to upload. Please keep files below 500KB';
}
}else{
    $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
}
}else{
    $statusMsg = 'Please select a file to upload.';
}
// Display status message
echo $statusMsg;

}elseif($_POST['updateHostButton']){
$NumberofImages=$_POST['ImageNumber'];
$No=$NumberofImages+1;
//Image querys
    $statusMsg = '';
    // File   upload path
    $targetDirectory = "C:/inetpub/wwwroot/1812315/TravelCommunity/hostImages/";
    $fileName =$_FILES["file"]["name"];

    $fileSize=$_FILES["file"]["size"];
    $targetFilePath = $targetDirectory . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
// $pass= md5($password);
    if(isset($_POST["hostButton"]) && !empty($_FILES["file"]["name"])){
// Allow certain file   formats
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes)){
            if($fileSize<=500000) {
// Upload file to server tmp_name
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                    $query = "INSERT INTO host(h_username, hostPhoto, imageNumber) 
          VALUES('$username', '$email', '$password','$No')";
                    $result = mysqli_query($conn, $query);
                    if($result){
                        $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
                        header('Location: interface.php');
                    } else {
                        $statusMsg = "File upload failed, please try again.";
                    }
                } else {
                    $statusMsg = "Sorry, there was an error uploading your file.";
                }
            }else{
                $statusMsg = 'Sorry, your file size is too large to upload. Please keep files below 500KB';
            }
        }else{
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
        }
    }else{
        $statusMsg = 'Please select a file to upload.';
    }
// Display status message
    echo $statusMsg;

}?>
