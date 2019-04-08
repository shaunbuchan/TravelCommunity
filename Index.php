
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign-Up</title>

</head>
<body>
<header class="header1"> <!-- class="control " provides the class name for styling the header and footer themes of the webpages, giving the pages a uniform look -->

    <section class="left"> <!--<section class="left" aligns section content to the left side of the header -->
        <h2>Travel Community</h2>
    </section>

    <section class="right"> <!-- <section class="right" aligns section content to the right side of the header -->
        <form id = "login"  method="post" action="login.php">

            <form class="login">
                <input type="text" placeholder="Username" name="username" class="inputtxt">
                <input type="password" placeholder="Password" name ="password" class="inputtxt">
                <button type="submit" value="Login" name="loginButton" class="btn">Login Button<br>

            </form>
    </section>
</header>
<!-- Main Starts -->

<main class="main1">
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
                        <button type="submit" value="Register" name="registerButton" class="btn">Register Button</button>
                    </div>

                </div>
        </section>
    </form>




</main>
<!-- Main Ends -->




</body>
</html>
