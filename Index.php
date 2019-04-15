
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign-Up</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body{
            background-image: url("images/rio.jpg");
        }
    </style>
</head>
<body>
<header style='margin-top:0px;' class="control">

        <h2 style=" margin-top: 0px;">Travel Community</h2>



    <!--div class="right"-->
        <form id = "login"  method="post" action="login.php">

                <input type="text" placeholder="Username" name="username" class="inputtxt">
                <input type="password" placeholder="Password" name ="password" class="inputtxt">
                <button type="submit" value="Login" name="loginButton" class="btn">Login<br>

        </form>
    </div>
</header>
<!-- Main Starts -->

<main class="content-control">
    <section class="boxregister">
    <form id="register" method="post" action="register.php" >

        <section  class="grid-60">

            <div class="userRegister">
                    <h2>Sign Up</h2><br><br>
                    <label for="username">User Name:</label>
                    <Input type="text" placeholder="Enter username" name="username" class="inputbox" required><br>
                    <label for="email">Email:</label>
                    <Input type="email" placeholder="Enter email" name="email" class="inputbox" required><br>
                    <label for="password">Password:</label>
                    <input type="password" placeholder="Enter Password" name="password" class="inputbox" required><br>
                    <label for="password2">Confirm Password:</label>
                    <input type="password" placeholder="Confirm Password" name="password2" class="inputbox" required><br>
                    <div id="submit">
                        <button type="submit" value="Register" name="registerButton" class="btn">Register</button>
                    </div>

                </div>
        </section>
    </form>




</main>
<!-- Main Ends -->




</body>
</html>
