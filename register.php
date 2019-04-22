<?php
session_start();
include_once('Connection.php');


    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if ($password == $password2) {
        $query = "INSERT INTO user(username, email, password, userLevel) 
          VALUES('$username', '$email', '$password','user')";
        $result = mysqli_query($conn, $query);

        // Create query to insert the user into the ratings table
        $query2="INSERT INTO ratings(username, rating, hits) 
                VALUES('$username', 0, 0)";
        $result2=mysqli_query($conn, $query2);
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
