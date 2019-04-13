<?php
include_once('login.php');
include_once('Connection.php');
if ( isset($_SESSION['username'] )) {
    $username = $_SESSION['username'];
}
else{
    header('Location: Index.php');
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search</title>

</head>
<body>

<main>
    <form method="GET" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <input name="keyword" size="20">
        <button type="submit">Search</button>
    </form>

    <?php
    if(isset($_GET["keyword"])){
        $keyword = $_GET["keyword"];
    }else{
        $keyword="";
    }
    $result = "";

    $query = "SELECT * FROM user WHERE username !='$username' AND userLevel !='admin' AND username LIKE '%" . $keyword . "%' ";
    $result = mysqli_query($conn, $query);

    $userList="";
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $userProfile=$row['username'];
            $userList .="<a href='createNewMessage.php?user=".$userProfile."' class ='cat_links'>".$userProfile." -<br> <font size=''-3', color='#778899'><br></a>";
        }
        echo $userList;
    } else{
        echo "<p style='color: #f9f9f9' class='searchresult'>There are no users associated with $keyword </p>";
    }
    ?>

</main>
<!--Main Ends -->
<!-- Footer -->
<footer>

</footer>
</body>
</html>