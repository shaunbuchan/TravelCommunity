<?php
include_once('login.php');
include_once('Connection.php');
if ( isset($_SESSION['username'] )) {
    $username = $_SESSION['username'];
    if (($_POST['acceptresponse']='accept')) {
        $rID = $_GET['rID'];


        $query = "SELECT * FROM requests WHERE requestID='$rID'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result)==1){
            while ($row= mysqli_fetch_assoc($result)){
                $host=$row['host'];
                $guest=$row['guest'];
                $dateFrom=$row['dateFrom'];
                $dateTo=$row['dateTo'];

            }
        }
        $query2="INSERT INTO ishosting(host, guest, dateFrom, dateTo) 
                  VALUES('$host', '$guest', '$dateFrom', '$dateTo')";
        $result2=mysqli_query($conn, $query2);
       if ($result2) {
                $query3="DELETE FROM requests WHERE requestID='$rID'";
                $result3=mysqli_query($conn, $query3);
           header('Location: hosting.php');
       }
    }

}
else{
    header('Location: index.php');
}?>
