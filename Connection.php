
<?php

$servername = "CSDM-WEBDEV";
$dbname="db1812315_cmm007";
$userdb = "1812315";
$passdb = "1812315";
// Create connection
$conn = new mysqli($servername, $userdb, $passdb, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully. ";
?>