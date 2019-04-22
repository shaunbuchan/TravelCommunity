<?php
session_start();
if (isset($_POST['loginButton'])) {
    include_once('Connection.php');
    $username = $_POST['username'];
    $password = $_POST['password'];


    $query = "SELECT *  FROM user where username = '$username' AND password ='$password' LIMIT 1 ";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)==1){
        $_SESSION['username'] = $username;
        while($row = mysqli_fetch_assoc($result)) {
            $user = $row['userLevel'];
        }
        if($user=='user') {
            header('Location: interface.php');
        }elseif($user=='admin'){
            header('Location: admin.php');
        }

    } else {
        echo "<b><i>Incorrect credentials</i><b>";
    }
}
?>
