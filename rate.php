<?php
session_start();
include_once('Connection.php');
$username=$_SESSION['username'];

$userReview=$_POST['user'];
$post_rating=$_POST['rating'];

$find_rating="SELECT * FROM ratings WHERE username='$userReview'";
$result=mysqli_query($conn, $find_rating);
while($row=mysqli_fetch_assoc($result)){
    $id=$row['ratingID'];
    $current_rating=$row['rating'];
    $current_hits=$row['hits'];
}
$new_hits=$current_hits+1;
$updateQuery="UPDATE ratings 
                SET hits='$new_hits' WHERE ratingID='$id'";
$result2=mysqli_query($conn, $updateQuery);

$new_rating=$current_rating + $post_rating;


$update_rating="Update ratings
                SET rating='$new_rating' WHERE ratingID='$id'";

$result3=mysqli_query($conn, $update_rating);
if($result3){
    $query4="INSERT INTO hasrated (recevingReview, writeReview) VALUES ('$userReview', '$username')";
    $result4=mysqli_query($conn, $query4);

    header('Location: interface.php');
}


?>
