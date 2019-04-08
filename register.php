<?php
session_start();
include_once('Connection.php');


    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    // $pass= md5($password);
    if ($password == $password2) {
        $query = "INSERT INTO user(username, email, password, userLevel) 
          VALUES('$username', '$email', '$password','user')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $_SESSION['username'] = $username;
            header('Location: interface.php');
        } else {
            echo "Failed to register";
        }
    }else {
       echo "passwords do not match";
    }

?>
