<?php
include_once('login.php');
include_once('Connection.php');
if ( isset($_SESSION['username'] )) {
    $username = $_SESSION['username'];

    if(($_POST['rejectresponse']='reject')) {
        $rID=$_GET['rID'];

        $username = $_SESSION['username'];
        $query = "DELETE FROM requests WHERE requestID='$rID'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            header('Location: hosting.php');
        }
    }
}
else{
    header('Location: index.php');
}?>
